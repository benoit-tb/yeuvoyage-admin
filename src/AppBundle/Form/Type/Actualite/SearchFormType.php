<?php

namespace AppBundle\Form\Type\Actualite;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 *
 * @author bturbe
 *        
 */
class SearchFormType extends AbstractType {


    public function __construct(){
    }
    /**
     * Construit le formulaire
     *
     * @param FormBuilderInterface $builder            
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

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
        return 'form_actualite_search';
    }
}