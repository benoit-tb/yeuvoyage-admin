<?php

namespace AppBundle\Entity;

/**
 * Bateau
 */
class Bateau
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var integer
     */
    private $nbPlace;

    /**
     * @var string
     */
    private $longueur;

    /**
     * @var string
     */
    private $largeur;

    /**
     * @var integer
     */
    private $vitesse;

    /**
     * @var string
     */
    private $infos;

    /**
     * @var \AppBundle\Entity\TypeBateau
     */
    private $typeBateau;

    /**
     * @var \AppBundle\Entity\Compagnie
     */
    private $compagnie;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Bateau
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set nbPlace
     *
     * @param integer $nbPlace
     *
     * @return Bateau
     */
    public function setNbPlace($nbPlace)
    {
        $this->nbPlace = $nbPlace;

        return $this;
    }

    /**
     * Get nbPlace
     *
     * @return integer
     */
    public function getNbPlace()
    {
        return $this->nbPlace;
    }

    /**
     * Set longueur
     *
     * @param string $longueur
     *
     * @return Bateau
     */
    public function setLongueur($longueur)
    {
        $this->longueur = $longueur;

        return $this;
    }

    /**
     * Get longueur
     *
     * @return string
     */
    public function getLongueur()
    {
        return $this->longueur;
    }

    /**
     * Set largeur
     *
     * @param string $largeur
     *
     * @return Bateau
     */
    public function setLargeur($largeur)
    {
        $this->largeur = $largeur;

        return $this;
    }

    /**
     * Get largeur
     *
     * @return string
     */
    public function getLargeur()
    {
        return $this->largeur;
    }

    /**
     * Set vitesse
     *
     * @param integer $vitesse
     *
     * @return Bateau
     */
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get vitesse
     *
     * @return integer
     */
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set infos
     *
     * @param string $infos
     *
     * @return Bateau
     */
    public function setInfos($infos)
    {
        $this->infos = $infos;

        return $this;
    }

    /**
     * Get infos
     *
     * @return string
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * Set typeBateau
     *
     * @param \AppBundle\Entity\TypeBateau $typeBateau
     *
     * @return Bateau
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
     * Set compagnie
     *
     * @param \AppBundle\Entity\Compagnie $compagnie
     *
     * @return Bateau
     */
    public function setCompagnie(\AppBundle\Entity\Compagnie $compagnie = null)
    {
        $this->compagnie = $compagnie;

        return $this;
    }

    /**
     * Get compagnie
     *
     * @return \AppBundle\Entity\Compagnie
     */
    public function getCompagnie()
    {
        return $this->compagnie;
    }
}

