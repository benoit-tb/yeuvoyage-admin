<?php

namespace AppBundle\Service;

use AppBundle\Entity\Compagnie;
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
    private $ressourceRepository;
    private $bateauRepository;
    private $bateauTypeRepository;

    /**
     * Constructeur
     * @param ObjectManager $entityManager
     */
    public function __construct(ObjectManager $entityManager){
        $this->entityManager = $entityManager;
        $this->compagnieRepository = $this->entityManager->getRepository('AppBundle:Compagnie');
        $this->ressourceRepository = $this->entityManager->getRepository('AppBundle:Ressource');
        $this->bateauRepository = $this->entityManager->getRepository('AppBundle:Bateau');
        $this->bateauTypeRepository = $this->entityManager->getRepository('AppBundle:TypeBateau');
    }

    public function getCompagnieById($id){
        return $this->compagnieRepository->findOneBy(array('id' => $id));
    }

    /**
     * Fonction retournant la liste des villes.
     *
     * @return array un tableau de la liste des villes
     */
    public function getCompagnies(){
        return $this->compagnieRepository->findAll();
    }

    /**
     * @param $compagnieId
     * @return array|null
     */
    public function getBateauxCompagnie($compagnieId){
        $bateauxCompagnie = null;
        $compagnie = $this->getCompagnieById($compagnieId);

        if (!is_null($compagnie) && $compagnie instanceof Compagnie){
            $bateauxCompagnie = $this->bateauRepository->findBy(array('compagnie' => $compagnie));
        }

        return $bateauxCompagnie;
    }

    /**
     * @param $compagnieId
     */
    public function getBureauxCompagnie($compagnieId){
        $bureauxCompagnie = null;
        $compagnie = $this->getCompagnieById($compagnieId);

        if (!is_null($compagnie) && $compagnie instanceof Compagnie){
            $bureauxCompagnie = $compagnie->getGares();
        }

        return $bureauxCompagnie;
    }

    public function getFichiersCompagnie($compagnieId){
        $fichiersCompagnie = null;
        $compagnie = $this->getCompagnieById($compagnieId);

        if (!is_null($compagnie) && $compagnie instanceof Compagnie){
            $fichiersCompagnie = $this->ressourceRepository->findBy(array('compagnie' => $compagnie));
        }

        return $fichiersCompagnie;
    }

    public function getFichierCompagnieById($id){
        return $this->ressourceRepository->findOneBy(array('id' => $id));
    }

    public function getBateauById($id){
        return $this->bateauRepository->findOneBy(array('id' => $id));
    }

    public function getBateauTypesCompagnie($compagnieId){
        $bateauTypesCompagnie = null;
        $compagnie = $this->getCompagnieById($compagnieId);

        if (!is_null($compagnie) && $compagnie instanceof Compagnie){
            $bateauTypesCompagnie = $this->bateauTypeRepository->findBy(array('compagnie' => $compagnie));
        }

        return $bateauTypesCompagnie;
    }
}