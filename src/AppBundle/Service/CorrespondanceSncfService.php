<?php

namespace AppBundle\Service;

use AppBundle\Entity\Trajet;
use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;

/**
 *
 * @author bturbe
 *
 */
class CorrespondanceSncfService extends AService{

    // Répositories
    private $correspondanceSncfRepository;
    private $villeRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->correspondanceSncfRepository = $this->entityManager->getRepository('AppBundle:SncfTrajets');
        $this->villeRepository = $this->entityManager->getRepository('AppBundle:Ville');

    }

    /**
     * FOnction permettant de retourner la liste de trajets
     * @param $data
     * @return mixed
     */
    public function getCorrespondancesSncf($data){

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('t')->from('AppBundle:SncfTrajets', 't');

        // Provenance
        if (!is_null($data["provenance"])){
            $provenance = $this->villeRepository->findOneBy(array('id' => $data["provenance"]));
            $qb->where('t.provenance = :provenance')->setParameter('provenance', $provenance);
        }

        // Destination
        if (!is_null($data["destination"])){
            $destination = $this->villeRepository->findOneBy(array('id' => $data["destination"]));
            $qb->andWhere('t.destination = :destination')->setParameter('destination', $destination);
        }

        // Date de début
        if (!is_null($data["dateDebut"])){
            $qb->andWhere('t.horaireDepart >= :date_debut')->setParameter('date_debut', $data["dateDebut"]);
        }

        // Date de fin
        if (!is_null($data["dateFin"])){
            $date = new \DateTime($data["dateFin"]);
            $date->add(new \DateInterval('P1D'));
            $qb->andWhere('t.horaireArrivee <= :date_fin')->setParameter('date_fin', $date->format('Y-m-d'));
        }

        $qb->orderBy('t.horaireDepart', 'DESC');

        return $qb->getQuery()->getResult();
    }
}