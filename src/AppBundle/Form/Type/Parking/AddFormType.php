<?php

namespace AppBundle\Form\Type\Parking;

use AppBundle\Service\GareService;
use AppBundle\Service\ParkingService;
use AppBundle\Service\VilleService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class AddFormType extends AbstractType {

    //
    private $parkingService;
    private $villeService;
    private $gareService;

    /**
     * @param ActualiteService $actualiteService
     */
    public function __construct(ParkingService $parkingService, VilleService $villeService, GareService $gareService){
        $this->parkingService = $parkingService;
        $this->villeService = $villeService;
        $this->gareService = $gareService;
    }
    /**
     * Construit le formulaire
     *
     * @param FormBuilderInterface $builder            
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $tabTypesParkings = array();
        $tabVilles = array();
        $tabGares = array();

        $typesParkings = $this->parkingService->getParkingTypes();
        if (count($typesParkings) > 0){
            foreach ($typesParkings as $typeParking){
                $tabTypesParkings[$typeParking->getId()] = $typeParking->getNom();
                $tabTypesParkings[$typeParking->getId()] = $typeParking->getNom();
            }
        }


        $villes = $this->villeService->getVillesPort();
        if (count($villes) > 0){
            foreach ($villes as $ville){
                $tabVilles[$ville->getId()] = $ville->getNom();
                $tabVilles[$ville->getId()] = $ville->getNom();
            }
        }

        $gares = $this->gareService->getGares();
        if (count($gares) > 0){
            foreach ($gares as $gare){
                $tabGares[$gare->getId()] = $gare->getAdresse();
                $tabGares[$gare->getId()] = $gare->getAdresse();
            }
        }

        // Titre
        $builder->add ( 'nom', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Nom',
            'required' => true
        ));

        // Type d'actualité
        $builder->add ( 'typeParking', 'choice', array (
            'choices' => $tabTypesParkings,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Type de parking',
            'required' => true
        ));

        // Adresse
        $builder->add ( 'adresse', 'textarea', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Adresse',
            'required' => true
        ));

        // Ville
        $builder->add ( 'ville', 'choice', array (
            'choices' => $tabVilles,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Ville',
            'required' => true
        ));

        $builder->add ( 'gare', 'choice', array (
            'choices' => $tabGares,
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Gare',
            'required' => true
        ));

        $builder->add ( 'distanceGare', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Distance approximative de la gare'
        ));

        $builder->add ( 'btn_map', 'button', array (
            'label' => " Renseigner la position",
            'attr' => array ('class' => 'btn btn-success fa fa-map-marker')
        ));

        $builder->add ( 'telephone', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Téléphone'
        ));

        $builder->add ( 'fax', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Fax'
        ));

        $builder->add ( 'email', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Email'
        ));

        $builder->add ( 'siteWeb', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Site Web'
        ));
        // Commentaire
        $builder->add ( 'dateOuverture', 'textarea', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Dates d\'ouverture'

        ));

        $builder->add ( 'prestations', 'textarea', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Prestations'

        ));

        // Lien site web
        $builder->add ( 'siteWeb', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
                'label'  => 'Lien site web',
            'required' => false
        ));

        // Bouton
        $builder->add ( 'btn_add', 'submit', array (
                'label' => 'Ajouter le parking',
                'attr' => array ('class' => 'btn btn-primary')
        ));
    }
    
    /**
     * Retourne le nom du formulaire
     *
     * @return string
     */
    public function getName() {
        return 'form_parking_add';
    }
}