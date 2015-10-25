<?php

namespace AppBundle\Form\Type\Traversee;

use AppBundle\Service\CompagnieService;
use AppBundle\Service\TypeBateauService;
use AppBundle\Service\VilleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class AddFormType extends AbstractType {

    private $villeService;
    private $compagnieService;
    private $typeBateauService;

    public function __construct(VilleService $villeService, CompagnieService $compagnieService, TypeBateauService $typeBateauService){
        $this->villeService = $villeService;
        $this->compagnieService = $compagnieService;
        $this->typeBateauService = $typeBateauService;
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
                $typesBateau = $this->typeBateauService->getTypeBateauByCompagnie($compagnie->getId());
                if (count($typesBateau) > 0){
                    foreach ($typesBateau as $typeBateau){
                        $tabCompagnie[$compagnie->getNom()][$typeBateau->getId()] = $typeBateau->getNom();
                    }
                }
            }
        }

        // Provenance
        $builder->add ( 'provenance', 'choice', array (
                'choices' => $tabProvenance,
                'attr' => array (
                        'class' => 'form-control'
                ),
                'label'  => 'Provenance',
                'required' => true
        ) );

        // Provenance
        $builder->add ( 'destination', 'choice', array (
            'choices' => $tabDestination,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Destination',
            'required' => true
        ) );

        // Type / Type de bateau
        $builder->add ( 'typeBateau', 'choice', array (
            'choices' => $tabCompagnie,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Type de bateau',
            'required' => true
        ) );

        // Date début
        $builder->add ( 'dateDepart', 'text', array (
                'attr' => array (
                        'class' => 'form-control date-picker' 
                ),
                'label'  => 'Date depart',
                'data' => date('Y-m-d'),
                'required' => true

        ) );
        
        // Horaire de départ
        $builder->add ( 'horaireDepart', 'text', array (
                'attr' => array (
                        'class' => 'form-control time-picker'
                ),
                'label'  => 'Horaire départ',
                'required' => true
        ));


        $builder->add ( 'btn_add', 'submit', array (
                'label' => 'Ajouter horaire',
                'attr' => array ('class' => 'btn btn-primary')
        ));
    }
    
    /**
     * Retourne le nom du formulaire
     *
     * @return string
     */
    public function getName() {
        return 'form_traversee_add';
    }
}