<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Parking;
use AppBundle\Form\Type\Parking\AddFormType;
use AppBundle\Form\Type\Parking\SearchFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;

class ParkingController extends AController
{

    /**
     * Controlleur principal de la gestion des parkings
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('parking/index.html.twig');
    }

    /**
     * Controlleur permettant d'afficher et rechercher les parkings.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function afficherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $parkingService = $this->get('parking_service');

        // Création du formulaire
        $form = $this->createForm (new SearchFormType($parkingService, $this->get('ville_service')));

        $parkingRepository = $em->getRepository('AppBundle:Parking');
        $results = $parkingRepository->createQueryBuilder('a')->getQuery()->getResult();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $results = $parkingService->getParkings($data);
            }
        }

        // replace this example code with whatever you need
        return $this->render('parking/afficher.html.twig', array(
                'results'=> $results,
                'form' => $form->createView())
        );
    }

    /**
     * Controlleur permettant d'ajouter un parking.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajouterAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $parkingService = $this->get('parking_service');
        $villeService = $this->get('ville_service');
        $gareService = $this->get('gare_service');

        // Création du formulaire
        $form = $this->createForm (new AddFormType($parkingService, $villeService, $gareService));

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();

                $typeParking = $parkingService->getParkingTypeById($data['typeParking']);
                $ville = $villeService->getVilleById($data['ville']);
                $gare = $gareService->getGareById($data['gare']);

                $parking = new Parking();
                $parking->setNom($data['nom']);
                $parking->setTypeParking($typeParking);
                $parking->setAdresse($data['adresse']);
                $parking->setVille($ville);
                $parking->setGare($gare);
                $parking->setDistanceGare($data['distanceGare']);
                $parking->setTelephone($data['telephone']);
                $parking->setFax($data['fax']);
                $parking->setMail($data['email']);
                $parking->setSiteWeb($data['siteWeb']);
                $parking->setDateOuverture($data['dateOuverture']);
                $parking->setPrestations($data['prestations']);

                //TODO
                //latitude, longitude, zoom

                $em->persist($parking);
                $em->flush();

                $this->addFlash('success', 'Le parking a correctement été enregistré.');
            }
        }

        // replace this example code with whatever you need
        return $this->render('parking/ajouter.html.twig', array(
                'form' => $form->createView())
        );
    }


    /**
     * Controlleur permettant de supprimer un parking.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function supprimerParkingAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $parkingService = $this->get('parking_service');

            $parking = $parkingService->getParkingById($request->request->get('parking_id'));

            if (!is_null($parking) && $parking instanceof Parking){
                $em->remove($parking);
                $em->flush();
                $this->addFlash('success', 'Le parking a correctement été supprimé.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }
}
