<?php

namespace AppBundle\Service;

use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;

/**
 *
 * @author bturbe
 *
 */
class VilleService extends AService{

    // Répository ville
    private $villeRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->villeRepository = $this->entityManager->getRepository('AppBundle:Ville');
    }

    /**
     * Fonction retournant la liste des villes.
     *
     * @return array un tableau de la liste des villes
     */
    public function getVilles(){
        return $this->villeRepository->findAll();
    }

    /**
     * Fonction permettant de retourner l'ensemble des villes qui sont des ports.
     *
     * @return array un tableau de la liste des villes portuaires
     */
    public function getVillesPort(){
        return $this->villeRepository->findBy(array('port' => true));
    }

    /**
     * Fonction permettant de retourner les villes desservant par les bus SNCF.
     *
     * @return array un tableau de la liste des villes.
     */
    public function getVillesSncf(){
        return $this->villeRepository->findBy(array('id' => array(2, 4)));
    }
}