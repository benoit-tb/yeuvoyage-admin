<?php

namespace AppBundle\Service;

use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;

/**
 *
 * @author bturbe
 *
 */
class CompagnieService extends AService{

    // Répository
    private $compagnieRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->compagnieRepository = $this->entityManager->getRepository('AppBundle:Compagnie');
    }

    /**
     * Fonction retournant la liste des villes.
     *
     * @return array un tableau de la liste des villes
     */
    public function getCompagnies(){
        return $this->compagnieRepository->findAll();
    }
}