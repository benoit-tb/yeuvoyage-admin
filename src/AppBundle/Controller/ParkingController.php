<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\Parking\SearchFormType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;

class ParkingController extends AController
{

    public function indexAction(Request $request)
    {
        return $this->render('parking/afficher.html.twig');
    }

    public function afficherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // Création du formulaire
        $form = $this->createForm (new SearchFormType($this->get('parking_service'), $this->get('ville_service')));

        $parkingRepository = $em->getRepository('AppBundle:Parking');
        $parkingTypeRepository = $em->getRepository('AppBundle:ParkingType');
        $results = $parkingRepository->createQueryBuilder('a')->getQuery()->getResult();

        // Post du formulaire
       /* if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $actualiteService = $this->get('actualite_service');
                $results = $actualiteService->getActualites($data);
            }
        }

        $actualiteTypes = $actualiteTypeRepository->findAll();*/

        // replace this example code with whatever you need
        return $this->render('parking/afficher.html.twig', array(
                'results'=> $results,
                'form' => $form->createView())
        );
    }
}
