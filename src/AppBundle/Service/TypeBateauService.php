<?php

namespace AppBundle\Service;

use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;

/**
 *
 * @author bturbe
 *
 */
class TypeBateauService extends AService{

    // Répository
    private $typeBateauRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->typeBateauRepository = $this->entityManager->getRepository('AppBundle:TypeBateau');
        $this->compagnieService = $this->entityManager->getRepository('AppBundle:Compagnie');
    }

    /**
     * Fonction retournant la liste des villes.
     *
     * @return array un tableau de la liste des villes
     */
    public function getTypeBateauByCompagnie($idCompagnie){
        $compagnie = $this->compagnieService->findOneBy(array('id' => $idCompagnie));
        return $this->typeBateauRepository->findBy(array('compagnie' => $compagnie));
    }
}