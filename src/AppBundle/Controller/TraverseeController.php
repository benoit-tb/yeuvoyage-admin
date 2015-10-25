<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use AppBundle\Form\Type\Traversee\AddFormType;
use AppBundle\Form\Type\Traversee\SearchFormType;
use AppBundle\Utils\Constant;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Controller\AController;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Validator\Constraints\DateTime;

class TraverseeController extends AController
{

    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('traversee/index.html.twig');
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
        $form = $this->createForm (new SearchFormType($this->get('ville_service'), $this->get('compagnie_service')));

        $traverseeRepository = $em->getRepository('AppBundle:Trajet');
        $results = $traverseeRepository->createQueryBuilder('t')->where('t.horaire LIKE :date')
                ->setParameter('date', date('Y-m-d').'%')
                ->getQuery()->getResult();

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $trajetService = $this->get('trajet_service');
                $results = $trajetService->getTrajets($data);
            }
        }

        // replace this example code with whatever you need
        return $this->render('traversee/afficher.html.twig', array('results'=> $results,'form' => $form->createView()));
    }

    public function ajouterAction(Request $request)
    {
        $form = $this->createForm (new AddFormType($this->get('ville_service'), $this->get('compagnie_service'), $this->get('type_bateau_service')));

        // Post du formulaire
        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if ($form->isValid()) {
                $data = $form->getData();
                $trajetService = $this->get('trajet_service');
                $trajetService->ajouterTrajet($data);

                $this->addFlash('success', 'L\'horaire supplémentaire a correctement été enregistré.');
            }
        }

        // replace this example code with whatever you need
        return $this->render('traversee/ajouter.html.twig', array('form' => $form->createView()));
    }

    public function importerAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add ( 'attachment', 'file', array (
                'label'  => 'Fichier CSV'
            ))
            ->add('btn_import', 'submit', array(
                'label'  => 'Importer'))
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
                $fileName = md5(uniqid()).'.csv';

                // Move the file to the directory where brochures are stored
                $brochuresDir = $this->container->getParameter('kernel.root_dir').'/../web/uploads/traversees';

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
        return $this->render('traversee/importer.html.twig', array('form' => $form->createView()));
    }

    public function exportAction(Request $request){
        $phpExcelObject = $this->get('phpexcel')->createPHPExcelObject();

        $phpExcelObject->getProperties()->setCreator("liuggio")
            ->setLastModifiedBy("Giulio De Donato")
            ->setTitle("Office 2005 XLSX Test Document")
            ->setSubject("Office 2005 XLSX Test Document")
            ->setDescription("Test document for Office 2005 XLSX, generated using PHP classes.")
            ->setKeywords("office 2005 openxml php")
            ->setCategory("Test result file");
        $phpExcelObject->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!');
        $phpExcelObject->getActiveSheet()->setTitle('Simple');
        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $phpExcelObject->setActiveSheetIndex(0);

        // create the writer
        $writer = $this->get('phpexcel')->createWriter($phpExcelObject, 'Excel5');
        // create the response
        $response = $this->get('phpexcel')->createStreamedResponse($writer);
        // adding headers
        $dispositionHeader = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'stream-file.xls'
        );
        $response->headers->set('Content-Type', 'text/vnd.ms-excel; charset=utf-8');
        $response->headers->set('Pragma', 'public');
        $response->headers->set('Cache-Control', 'maxage=1');
        $response->headers->set('Content-Disposition', $dispositionHeader);

        return $response;
    }

    /**
     * Retourne les informations d'une traversée.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getTrajetByIdAction(Request $request){
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $result['destination'] = $trajet->getDestination()->getNom();
                $result['provenance'] = $trajet->getProvenance()->getNom();
                $result['date'] = $trajet->getHoraire()->format('Y-m-d');
                $result['horaireOrigine'] = $trajet->getHoraire()->format('H:i');
                $result['compagnie'] = $trajet->getTypeBateau()->getCompagnie()->getNom();
                return new JsonResponse($result);
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * Modification de l'horaire de départ d'une traversée.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function updateHoursTrajetAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get('trajet_id'));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $trajetOrigine = $trajet->getHoraire();
                $horaireOrigine = $trajetOrigine->format('H:i');
                $trajet->setHoraireOrigine($horaireOrigine);
                $trajet->setStatut(Constant::ID_STATUT_TRAJET_HORAIRE_MODIFIE);
                $trajet->setHoraire(new \DateTime($request->request->get('nouveau_horaire'). ':00'));
                $em->persist($trajet);
                $em->flush();

                $this->addFlash('success', 'L\'horaire de départ a correctement été modifié.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function annulerTraverseeAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $trajet->setStatut(Constant::ID_STATUT_TRAJET_HORAIRE_ANNULE);
                $em->persist($trajet);
                $em->flush();
                $this->addFlash('success', 'La traversée a correctement été annulée.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function activerHoraireFacultatifAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $trajet->setFacultatif(false);
                $em->persist($trajet);
                $em->flush();
                $this->addFlash('success', 'La traversée a correctement été activée.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function supprimerHoraireSupplementaireAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $em->remove($trajet);
                $em->flush();
                $this->addFlash('success', 'Le trajet a correctement été supprimé.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function retablirHoraireModifieAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $date = new \DateTime($trajet->getHoraire()->format('Y-m-d') . ' ' . $trajet->getHoraireOrigine());
                $trajet->setHoraire($date);
                $trajet->setHoraireOrigine(null);
                $trajet->setStatut(0);
                $em->persist($trajet);
                $em->flush();
                $this->addFlash('success', 'L\'horaire de départ a correctement été retablit.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function retablirTrajetAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod ( 'POST' )) {
            $trajetService = $this->get('trajet_service');

            $trajet = $trajetService->getTrajetById($request->request->get ( 'trajet_id' ));

            if (!is_null($trajet) && $trajet instanceof Trajet){
                $trajet->setStatut(0);
                $em->persist($trajet);
                $em->flush();
                $this->addFlash('success', 'Le trajet a correctement été retablit.');
                return new JsonResponse(array('succes' => "1", 'error' => '0'));
            }
        }
        return new JsonResponse(array('succes' => "0", 'error' => '1'));
    }
}
