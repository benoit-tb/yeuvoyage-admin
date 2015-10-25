<?php

namespace AppBundle\Form\Type\Traversee;

use AppBundle\Service\CompagnieService;
use AppBundle\Service\VilleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class SearchFormType extends AbstractType {

    private $villeService;
    private $compagnieService;

    public function __construct(VilleService $villeService, CompagnieService $compagnieService){
        $this->villeService = $villeService;
        $this->compagnieService = $compagnieService;
    }
    /**
     * Construit le formulaire
     *
     * @param FormBuilderInterface $builder            
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $tabProvenance = array();
        $tabDestination = array();
        $tabCompagnie = array();

        $villes = $this->villeService->getVillesPort();
        if (count($villes) > 0){
            foreach ($villes as $ville){
                $tabDestination[$ville->getId()] = $ville->getNom();
                $tabProvenance[$ville->getId()] = $ville->getNom();
            }
        }

        $compagnies = $this->compagnieService->getCompagnies();
        if (count($compagnies) > 0){
            foreach ($compagnies as $compagnie){
                $tabCompagnie[$compagnie->getId()] = $compagnie->getNom();
            }
        }

        // Provenance
        $builder->add ( 'provenance', 'choice', array (
                'choices' => $tabProvenance,
                'attr' => array (
                        'class' => 'form-control'
                ),
                'label'  => 'Provenance',
                'required' => false
        ) );

        // Provenance
        $builder->add ( 'destination', 'choice', array (
            'choices' => $tabDestination,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Destination',
            'required' => false
        ) );

        // Compagnie
        $builder->add ( 'compagnie', 'choice', array (
            'choices' => $tabCompagnie,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Compagnie',
            'required' => false
        ) );

        // Date début
        $builder->add ( 'dateDebut', 'text', array (
                'attr' => array (
                        'class' => 'form-control date-picker' 
                ),
                'label'  => 'Date début',
                'data' => date('Y-m-d')
        ) );
        
        // Date fin
        $builder->add ( 'dateFin', 'text', array (
                'attr' => array (
                        'class' => 'form-control date-picker'
                ),
                'label'  => 'Date fin',
                'data' => date('Y-m-d')
        ));


        $builder->add ( 'btn_display', 'submit', array (
                'label' => 'Afficher',
                'attr' => array ('class' => 'btn btn-primary')
        ));
    }
    
    /**
     * Retourne le nom du formulaire
     *
     * @return string
     */
    public function getName() {
        return 'form_traversee_search';
    }
}