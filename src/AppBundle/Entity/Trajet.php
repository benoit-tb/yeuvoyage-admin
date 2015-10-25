<?php

namespace AppBundle\Entity;

/**
 * Trajet
 */
class Trajet
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $horaire;

    /**
     * @var boolean
     */
    private $facultatif;

    /**
     * @var integer
     */
    private $statut = '0';

    /**
     * @var string
     */
    private $infosStatut;

    /**
     * @var \DateTime
     */
    private $horaireOrigine;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $destination;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $provenance;

    /**
     * @var \AppBundle\Entity\TypeBateau
     */
    private $typeBateau;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idUtilisateur;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->facultatif = false;
        $this->idUtilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set horaire
     *
     * @param \DateTime $horaire
     *
     * @return Trajet
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;

        return $this;
    }

    /**
     * Get horaire
     *
     * @return \DateTime
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * Set facultatif
     *
     * @param boolean $facultatif
     *
     * @return Trajet
     */
    public function setFacultatif($facultatif)
    {
        $this->facultatif = $facultatif;

        return $this;
    }

    /**
     * Get facultatif
     *
     * @return boolean
     */
    public function getFacultatif()
    {
        return $this->facultatif;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return Trajet
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set infosStatut
     *
     * @param string $infosStatut
     *
     * @return Trajet
     */
    public function setInfosStatut($infosStatut)
    {
        $this->infosStatut = $infosStatut;

        return $this;
    }

    /**
     * Get infosStatut
     *
     * @return string
     */
    public function getInfosStatut()
    {
        return $this->infosStatut;
    }

    /**
     * Set horaireOrigine
     *
     * @param \DateTime $horaireOrigine
     *
     * @return Trajet
     */
    public function setHoraireOrigine($horaireOrigine)
    {
        $this->horaireOrigine = $horaireOrigine;

        return $this;
    }

    /**
     * Get horaireOrigine
     *
     * @return \DateTime
     */
    public function getHoraireOrigine()
    {
        return $this->horaireOrigine;
    }

    /**
     * Set destination
     *
     * @param \AppBundle\Entity\Ville $destination
     *
     * @return Trajet
     */
    public function setDestination(\AppBundle\Entity\Ville $destination = null)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get destination
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set provenance
     *
     * @param \AppBundle\Entity\Ville $provenance
     *
     * @return Trajet
     */
    public function setProvenance(\AppBundle\Entity\Ville $provenance = null)
    {
        $this->provenance = $provenance;

        return $this;
    }

    /**
     * Get provenance
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getProvenance()
    {
        return $this->provenance;
    }

    /**
     * Set TypeBateau
     *
     * @param \AppBundle\Entity\TypeBateau $typeBateau
     *
     * @return Trajet
     */
    public function setTypeBateau(\AppBundle\Entity\TypeBateau $typeBateau = null)
    {
        $this->typeBateau = $typeBateau;

        return $this;
    }

    /**
     * Get typeBateau
     *
     * @return \AppBundle\Entity\TypeBateau
     */
    public function getTypeBateau()
    {
        return $this->typeBateau;
    }

    /**
     * Add idUtilisateur
     *
     * @param \AppBundle\Entity\YvUtilisateur $idUtilisateur
     *
     * @return Trajet
     */
    public function addIdUtilisateur(\AppBundle\Entity\YvUtilisateur $idUtilisateur)
    {
        $this->idUtilisateur[] = $idUtilisateur;

        return $this;
    }

    /**
     * Remove idUtilisateur
     *
     * @param \AppBundle\Entity\YvUtilisateur $idUtilisateur
     */
    public function removeIdUtilisateur(\AppBundle\Entity\YvUtilisateur $idUtilisateur)
    {
        $this->idUtilisateur->removeElement($idUtilisateur);
    }

    /**
     * Get idUtilisateur
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }
}

