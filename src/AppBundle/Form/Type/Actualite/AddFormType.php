<?php

namespace AppBundle\Form\Type\Actualite;

use AppBundle\Service\ActualiteService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class AddFormType extends AbstractType {

    //
    private $actualiteService;

    /**
     * @param ActualiteService $actualiteService
     */
    public function __construct(ActualiteService $actualiteService){
        $this->actualiteService = $actualiteService;
    }
    /**
     * Construit le formulaire
     *
     * @param FormBuilderInterface $builder            
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $tabTypesActualites = array();

        $typesActualites = $this->actualiteService->getActualiteTypes();
        if (count($typesActualites) > 0){
            foreach ($typesActualites as $typesActualite){
                $tabTypesActualites[$typesActualite->getId()] = $typesActualite->getLabel();
                $tabTypesActualites[$typesActualite->getId()] = $typesActualite->getLabel();
            }
        }

        // Titre
        $builder->add ( 'titre', 'text', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Titre',
            'required' => true
        ));

        // Commentaire
        $builder->add ( 'commentaire', 'textarea', array (
            'attr' => array (
                'class' => 'form-control'
            ),
            'label'  => 'Commentaire',
            'required' => true

        ));

        // Date début
        $builder->add ( 'startDate', 'text', array (
            'attr' => array (
                'class' => 'form-control date-picker'
            ),
            'label'  => 'Date début affichage',
            'data' => date('Y-m-d'),
            'required' => true

        ) );

        // Date fin
        $builder->add ( 'endDate', 'text', array (
            'attr' => array (
                'class' => 'form-control date-picker'
            ),
            'label'  => 'Date fin affichage',
            'data' => date('Y-m-d'),
            'required' => true
        ));

        // Afficher accueil
        $builder->add('afficherAccueil', 'checkbox', array(
            'label'    => 'Afficher sur l\'écran d\'accueil ',
            'required' => false,
        ));

        // Type d'actualité
        $builder->add ( 'typeActualite', 'choice', array (
                'choices' => $tabTypesActualites,
                'attr' => array (
                        'class' => 'form-control'
                ),
                'label'  => 'Type d\'actualité',
                'required' => true
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
                'label' => 'Ajouter actualité',
                'attr' => array ('class' => 'btn btn-primary')
        ));
    }
    
    /**
     * Retourne le nom du formulaire
     *
     * @return string
     */
    public function getName() {
        return 'form_actualite_add';
    }
}