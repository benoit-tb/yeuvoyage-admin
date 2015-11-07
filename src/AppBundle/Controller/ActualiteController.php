<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actualite;
use AppBundle\Entity\ActualiteType;
use AppBundle\Form\Type\Actualite\SearchFormType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;

class ActualiteController extends AController
{

    public function indexAction(Request $request)
    {
        return $this->render('actualite/index.html.twig');
    }

    /**
     * Controlleur permettant d'afficher la liste des traversées.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function afficherAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        // Création du formulaire
        $form = $this->createForm (new SearchFormType());

        $actualiteRepository = $em->getRepository('AppBundle:Actualite');
        $actualiteTypeRepository = $em->getRepository('AppBundle:ActualiteType');
        $results = $actualiteRepository->createQueryBuilder('a')->getQuery()->getResult();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $actualiteService = $this->get('actualite_service');
                $results = $actualiteService->getActualites($data);
            }
        }

        $actualiteTypes = $actualiteTypeRepository->findAll();

        // replace this example code with whatever you need
        return $this->render('actualite/afficher.html.twig', array(
            'results'=> $results,
            'actualiteTypes' => $actualiteTypes,
            'form' => $form->createView())
        );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function supprimerActualiteAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $actualiteService = $this->get('actualite_service');

            $actualite = $actualiteService->getActualiteById($request->request->get ( 'actualite_id' ));

            if (!is_null($actualite) && $actualite instanceof Actualite){
                $em->remove($actualite);
                $em->flush();
                $this->addFlash('success', 'L\'actualité a correctement été supprimée.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    public function getActualiteByIdAction(Request $request){
        if ($request->isMethod ( 'POST' )) {
            $actualiteService = $this->get('actualite_service');

            $actualite = $actualiteService->getActualiteById($request->request->get ( 'actualite_id' ));

            if (!is_null($actualite) && $actualite instanceof Actualite){
                $result['titre'] = $actualite->getTitre();
                $result['commentaire'] = $actualite->getCommentaire();
                $result['start_date'] = $actualite->getDateDebutAffichage()->format('Y-m-d');
                $result['end_date'] = $actualite->getDateFinAffichage()->format('Y-m-d');
                $result['afficher_accueil'] = $actualite->getAfficherAccueil();
                $result['type'] = $actualite->getType()->getLabel();
                return new JsonResponse($result);
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    public function modifierActualiteAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $actualiteService = $this->get('actualite_service');

            $actualite = $actualiteService->getActualiteById($request->request->get ( 'actualite_id' ));

            if (!is_null($actualite) && $actualite instanceof Actualite){
                $actualite->setTitre($request->request->get('titre'));
                $actualite->setCommentaire($request->request->get('commentaire'));
                $actualite->setDateDebutAffichage(new \DateTime($request->request->get('start_date')));
                $actualite->setDateFinAffichage(new \DateTime($request->request->get('end_date')));
                $afficherAccueil = $request->request->get('afficher_accueil') === 'true' ? true: false;
                $actualite->setAfficherAccueil($afficherAccueil);
                $actualiteType = $actualiteService->getActualiteTypeById($request->request->get('type_actualite'));
                if (!is_null($actualiteType) && $actualiteType instanceof ActualiteType) {
                    $actualite->setType($actualiteType);
                }
                $em->persist($actualite);
                $em->flush();

                $this->addFlash('success', 'L\'actualité a correctement été modifiée.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }
}
