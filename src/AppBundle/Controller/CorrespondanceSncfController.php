<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;
use AppBundle\Form\Type\CorrespondanceSncf\SearchFormType;

class CorrespondanceSncfController extends AController
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('correspondance_sncf/index.html.twig');
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
        $form = $this->createForm (new SearchFormType($this->get('ville_service')));

        $correspondanceSncfRepository = $em->getRepository('AppBundle:SncfTrajets');
        $results = $correspondanceSncfRepository->createQueryBuilder('t')->where('t.horaireDepart LIKE :date')
                ->setParameter('date', date('Y-m-d').'%')
                ->getQuery()->getResult();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $correspondanceSncfService = $this->get('correspondance_sncf_service');
                $results = $correspondanceSncfService->getCorrespondancesSncf($data);
            }
        }

        // replace this example code with whatever you need
        return $this->render('correspondance_sncf/afficher.html.twig', array('results'=> $results,'form' => $form->createView()));
    }


    public function importerAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('attachment', 'file', array(
                'label' => 'Fichier CSV'
            ))
            ->add('btn_import', 'submit', array(
                'label' => 'Importer'))
            ->getForm();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {

                //echo get_class($form['attachment']);

                $data = $form->getData();

                //var_dump($data);
                //echo count($data);
                //  echo get_class($data[0)];
                //die;

                $file = $form['attachment'];
//echo "<pre>";
                //echo var_dump($data); die;

                // Generate a unique name for the file before saving it
                $fileName = md5(uniqid()) . '.csv';

                // Move the file to the directory where brochures are stored
                $brochuresDir = $this->container->getParameter('kernel.root_dir') . '/../web/uploads/traversees';

                $file->getData()->move($brochuresDir, $fileName);

                // $file->move($brochuresDir, $fileName);

                // Update the 'brochure' property to store the PDF file name
                // instead of its contents
                // $product->setBrochure($fileName);

                // ... persist the $product variable or any other work

                return $this->redirect($this->generateUrl('app_product_list'));
            }
        }

        // replace this example code with whatever you need
        return $this->render('correspondance_sncf/importer.html.twig', array('form' => $form->createView()));
    }
}
