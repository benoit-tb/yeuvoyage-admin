<?php

namespace AppBundle\Service;

use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Service permettant de gérer les informations sur les gare.
 *
 * @author bturbe
 *
 */
class GareService extends AService{

    // Repository
    private $gareRepository;

    /**
     * Constructeur.
     *
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->gareRepository = $this->entityManager->getRepository('AppBundle:Gare');
    }

    /**
     * Retourne une gare en fonction de son identifiant.
     *
     * @param $id integer l'identifiant de la gare.
     * @return object Gare la gare en question
     */
    public function getGareById($id){
        return $this->gareRepository->findOneBy(array('id' => $id));
    }


    /**
     * Retourne l'ensemble des gares.
     *
     * @return array les gares
     */
    public function getGares(){
        return $this->gareRepository->findAll();
    }
}