<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Bateau;
use AppBundle\Entity\Compagnie;
use AppBundle\Entity\Ressource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;

class CompagnieController extends AController
{

    public function indexAction(Request $request)
    {
        return $this->render('compagnie/afficher.html.twig');
    }

    public function afficherAction(Request $request, $compagnieId)
    {
        $compagnieService = $this->get('compagnie_service');


        $compagnie = $compagnieService->getCompagnieById($compagnieId);

        $bateauxCompagnie = $compagnieService->getBateauxCompagnie($compagnieId);
        $bureauxCompagnie = $compagnieService->getBureauxCompagnie($compagnieId);
        $fichiersCompagnie = $compagnieService->getFichiersCompagnie($compagnieId);
        $bateauTypesCompagnie = $compagnieService->getBateauTypesCompagnie($compagnieId);

        return $this->render('compagnie/afficher.html.twig', array(
            'compagnie' => $compagnie,
            'bateauxCompagnie' => $bateauxCompagnie,
            'bureauxCompagnie' => $bureauxCompagnie,
            'fichiersCompagnie' => $fichiersCompagnie,
            'bateauTypesCompagnie' => $bateauTypesCompagnie));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function modifierCompagnieAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $compagnieService = $this->get('compagnie_service');

            $compagnie = $compagnieService->getCompagnieById($request->request->get('compagnie_id'));

            if (!is_null($compagnie) && $compagnie instanceof Compagnie){
                $compagnie->setDescription($request->request->get('description'));
                $compagnie->setTelephone($request->request->get('telephone'));
                $compagnie->setMail($request->request->get('mail'));
                $compagnie->setSite($request->request->get('site_web'));

                $em->persist($compagnie);
                $em->flush();

                $this->addFlash('success', 'Les informations sur la compagnie ont été modifiées.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function supprimerFichierAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $compagnieService = $this->get('compagnie_service');

            $fichier = $compagnieService->getFichierCompagnieById($request->request->get('fichier_id'));

            if (!is_null($fichier) && $fichier instanceof Ressource){
                $em->remove($fichier);
                $em->flush();

                $this->addFlash('success', 'Le fichier a correctement été supprimé.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    public function detailFichierAction(Request $request){
        if ($request->isMethod ( 'POST' )) {
            $compagnieService = $this->get('compagnie_service');

            $fichier = $compagnieService->getFichierCompagnieById($request->request->get('fichier_id'));

            if (!is_null($fichier) && $fichier instanceof Ressource){
                $result['nom'] = $fichier->getTitre();
                $result['description'] = $fichier->getDescription();
                $result['url'] = $fichier->getUrl();
                return new JsonResponse($result);
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }


    public function modifierFichierAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $compagnieService = $this->get('compagnie_service');

            $fichier = $compagnieService->getFichierCompagnieById($request->request->get('fichier_id'));

            if (!is_null($fichier) && $fichier instanceof Ressource){
                $fichier->setTitre($request->request->get('nom_fichier'));
                $fichier->setDescription($request->request->get('description_fichier'));
                $em->persist($fichier);
                $em->flush();

                $this->addFlash('success', 'Les informations sur le fichier ont été modifiées.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }


    public function detailBateauAction(Request $request){
        if ($request->isMethod ( 'POST' )) {
            $compagnieService = $this->get('compagnie_service');

            $bateau= $compagnieService->getBateauById($request->request->get('bateau_id'));

            if (!is_null($bateau) && $bateau instanceof Bateau){
                $result['nom'] = $bateau->getNom();
                $result['type_id'] = $bateau->getTypeBateau()->getId();
                $result['type'] = $bateau->getTypeBateau()->getNom();
                $result['nb_places'] = $bateau->getNbPlace();
                $result['longueur'] = $bateau->getLongueur();
                $result['largeur'] = $bateau->getLargeur();
                $result['vitesse'] = $bateau->getVitesse();
                $result['infos'] = $bateau->getInfos();
                return new JsonResponse($result);
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }
}
