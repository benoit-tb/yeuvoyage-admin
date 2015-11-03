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
class ActualiteService extends AService{

    private $actualiteRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->actualiteRepository = $this->entityManager->getRepository('AppBundle:Actualite');
    }

    /**
     * Retourne l'actualite en fonction de son identifiant.
     *
     * @param $id
     * @return object
     */
    public function getActualiteById($id){
        return $this->actualiteRepository->findOneBy(array('id' => $id));
    }

    /**
     * Fonction permettant de retourner la liste de trajets
     * @param $data
     * @return mixed
     */
    public function getActualites($data){

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