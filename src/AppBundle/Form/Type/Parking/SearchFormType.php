<?php

namespace AppBundle\Form\Type\Parking;

use AppBundle\Service\ParkingService;
use AppBundle\Service\VilleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class SearchFormType extends AbstractType {

    private $parkingService;
    private $villeService;

    public function __construct(ParkingService $parkingService, VilleService $villeService){
        $this->parkingService = $parkingService;
        $this->villeService = $villeService;
    }
    /**
     * Construit le formulaire
     *
     * @param FormBuilderInterface $builder            
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $tabTypesParking = array();
        $tabVilles = array();

        $typesParking = $this->parkingService->getParkingTypes();
        if (count($typesParking) > 0){
            foreach ($typesParking as $typeParking){
                $tabTypesParking[$typeParking->getId()] = $typeParking->getNom();
                $tabTypesParking[$typeParking->getId()] = $typeParking->getNom();
            }
        }

        $villes = $this->villeService->getVillesPort();
        if (count($villes) > 0){
            foreach ($villes as $ville){
                $tabVilles[$ville->getId()] = $ville->getNom();
                $tabVilles[$ville->getId()] = $ville->getNom();
            }
        }

        // Type de parking
        $builder->add ( 'typeParking', 'choice', array (
            'choices' => $tabTypesParking,
            'attr' => array (
                'class' => 'form-control form-large '
            ),
            'label'  => 'Type de parking',
            'required' => true
        ));

        // Villes
        $builder->add ( 'ville', 'choice', array (
            'choices' => $tabVilles,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Ville',
            'required' => true
        ));

        // Bouton sauvegarde
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
        return 'form_parking_search';
    }
}