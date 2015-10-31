<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\Actualite\SearchFormType;
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
        $results = $actualiteRepository->createQueryBuilder('a')->getQuery()->getResult();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                /*$data = $form->getData();
                $trajetService = $this->get('trajet_service');
                $results = $trajetService->getTrajets($data);*/
            }
        }

        // replace this example code with whatever you need
        return $this->render('actualite/afficher.html.twig', array('results'=> $results,'form' => $form->createView()));
    }
}
