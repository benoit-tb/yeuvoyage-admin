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
class ParkingService extends AService{

    private $parkingRepository;

    private $parkingTypeRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->parkingRepository = $this->entityManager->getRepository('AppBundle:Parking');
        $this->parkingTypeRepository = $this->entityManager->getRepository('AppBundle:ParkingType');
    }

    /**
     * Retourne l'actualite en fonction de son identifiant.
     *
     * @param $id
     * @return object
     */
    public function getActualiteById($id){
        return $this->parkingRepository->findOneBy(array('id' => $id));
    }

    public function getActualiteTypeById($id){
        return $this->parkingTypeRepository->findOneBy(array('id' => $id));
    }

    /**
     * @return array
     */
    public function getParkingTypes(){
        return $this->parkingTypeRepository->findAll();
    }

    /**
     * Fonction permettant de retourner la liste de trajets
     * @param $data
     * @return mixed
     */
    public function getParkings($data){

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('a')->from('AppBundle:Actualite', 'a');

        // Date de début
        if (!is_null($data["dateDebut"])){
            $qb->andWhere('a.date >= :date_debut')->setParameter('date_debut', $data["dateDebut"]);
        }

        // Date de fin
        if (!is_null($data["dateFin"])){
            $date = new \DateTime($data["dateFin"]);
            $date->add(new \DateInterval('P1D'));
            $qb->andWhere('a.date <= :date_fin')->setParameter('date_fin', $date->format('Y-m-d'));
        }

        $qb->orderBy('a.date', 'DESC');

        return $qb->getQuery()->getResult();
    }
}