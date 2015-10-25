<?php

namespace AppBundle\Service;

use AppBundle\Entity\Trajet;
use AppBundle\Service\AService;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityRepository;
use AppBundle\Utils\Constant;

/**
 *
 * @author bturbe
 *
 */
class TrajetService extends AService{

    // Répositories
    private $trajetRepository;
    private $villeRepository;
    private $compagnieRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->trajetRepository = $this->entityManager->getRepository('AppBundle:Trajet');
        $this->villeRepository = $this->entityManager->getRepository('AppBundle:Ville');
        $this->compagnieRepository = $this->entityManager->getRepository('AppBundle:Compagnie');
        $this->typeBateauRepository = $this->entityManager->getRepository('AppBundle:TypeBateau');
    }

    /**
     * Retourne les informations d'un trajet via son identifiant.
     *
     * @param $id l'identifiant du trajet.
     * @return object le trajet
     */
    public function getTrajetById($id){
        return $this->trajetRepository->findOneBy(array('id' => $id));
    }

    /**
     * FOnction permettant de retourner la liste de trajets
     * @param $data
     * @return mixed
     */
    public function getTrajets($data){

        $qb = $this->entityManager->createQueryBuilder();

        $qb->select('t')->from('AppBundle:Trajet', 't');

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

        // Compagnie
        if (!is_null($data["compagnie"])){
            $compagnie = $this->compagnieRepository->findOneBy(array('id' => $data["compagnie"]));
            $qb->andWhere('t.compagnie = :compagnie')->setParameter('compagnie', $compagnie);
        }

        // Date de début
        if (!is_null($data["dateDebut"])){
            $qb->andWhere('t.horaire >= :date_debut')->setParameter('date_debut', $data["dateDebut"]);
        }

        // Date de fin
        if (!is_null($data["dateFin"])){
            $date = new \DateTime($data["dateFin"]);
            $date->add(new \DateInterval('P1D'));
            $qb->andWhere('t.horaire <= :date_fin')->setParameter('date_fin', $date->format('Y-m-d'));
        }

        $qb->orderBy('t.horaire', 'DESC');

        return $qb->getQuery()->getResult();
    }

    /**
     * Fonction permettant d'ajouter un trajet supplémentaire.
     *
     * @param $data les données du formulaire posté.
     */
    public function ajouterTrajet($data){

        $trajetSupplementaire = new Trajet();
        $trajetSupplementaire->setStatut(Constant::ID_STATUT_TRAJET_HORAIRE_SUPPLEMENTAIRE);
        // Provenance
        if (!is_null($data["provenance"])){
            $provenance = $this->villeRepository->findOneBy(array('id' => $data["provenance"]));
            $trajetSupplementaire->setProvenance($provenance);
        }

        // Destination
        if (!is_null($data["destination"])){
            $destination = $this->villeRepository->findOneBy(array('id' => $data["destination"]));
            $trajetSupplementaire->setDestination($destination);

        }

        // Compagnie
        if (!is_null($data["typeBateau"])){
            $typeBateau = $this->typeBateauRepository->findOneBy(array('id' => $data["typeBateau"]));
            $trajetSupplementaire->setTypeBateau($typeBateau);
        }

        // Horaire de départ
        if (!is_null($data["dateDepart"]) && !is_null($data["horaireDepart"])){
            $dateDepart = new \DateTime($data["dateDepart"] . ' '.$data["horaireDepart"]. ':00');
            $trajetSupplementaire->setHoraire($dateDepart);

        }

        $this->entityManager->persist($trajetSupplementaire);
        $this->entityManager->flush();
    }
}