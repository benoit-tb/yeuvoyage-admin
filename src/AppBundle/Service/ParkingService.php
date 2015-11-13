<?php

namespace AppBundle\Service;

use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Service permettant de gérer les informations sur les parkings.
 *
 * @author bturbe
 *
 */
class ParkingService extends AService{

    // Repository
    private $parkingRepository;
    private $parkingTypeRepository;

    /**
     * Constructeur.s
     *
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->parkingRepository = $this->entityManager->getRepository('AppBundle:Parking');
        $this->parkingTypeRepository = $this->entityManager->getRepository('AppBundle:ParkingType');
    }

    /**
     * Retourne un parking en fonction de son identifiant.
     *
     * @param $id integer l'identifiant du parking.
     * @return object Parking le parking en question
     */
    public function getParkingById($id){
        return $this->parkingRepository->findOneBy(array('id' => $id));
    }

    /**
     * Retourne un type de parking en fonction de son identifiant.
     *
     * @param $id integer l'identifiant du type de parking
     * @return object ParkingType le type de parking
     */
    public function getParkingTypeById($id){
        return $this->parkingTypeRepository->findOneBy(array('id' => $id));
    }

    /**
     * Retourne l'ensemble des types de parkings.
     *
     * @return array les types de parking
     */
    public function getParkingTypes(){
        return $this->parkingTypeRepository->findAll();
    }

    /**
     * Fonction permettant de retourner la liste de parkings.
     *
     * @param $data array le tableau des paramètres
     * @return mixed la liste des parkings
     */
    public function getParkings($data){

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('p')->from('AppBundle:Parking', 'p');

        // Date de début
        if (!is_null($data["typeParking"])){
            $qb->andWhere('p.typeParking = :type')->setParameter('type', $data["typeParking"]);
        }

        if (!is_null($data["ville"])){
            $qb->andWhere('p.ville = :ville')->setParameter('ville', $data["ville"]);
        }

        return $qb->getQuery()->getResult();
    }
}