<?php

namespace AppBundle\Entity;

/**
 * YvBateau
 */
class YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
     * @return YvBateau
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
}

