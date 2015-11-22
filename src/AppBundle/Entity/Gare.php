<?php

namespace AppBundle\Entity;

/**
 * Gare
 */
class Gare
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var boolean
     */
    private $autreWifi;

    /**
     * @var boolean
     */
    private $autreSncf;

    /**
     * @var boolean
     */
    private $mapZoom;

    /**
     * @var string
     */
    private $mapLatitude;

    /**
     * @var string
     */
    private $mapLongitude;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $ville;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $compagnies;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->compagnies = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Gare
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set autreWifi
     *
     * @param boolean $autreWifi
     *
     * @return Gare
     */
    public function setAutreWifi($autreWifi)
    {
        $this->autreWifi = $autreWifi;

        return $this;
    }

    /**
     * Get autreWifi
     *
     * @return boolean
     */
    public function getAutreWifi()
    {
        return $this->autreWifi;
    }

    /**
     * Set autreSncf
     *
     * @param boolean $autreSncf
     *
     * @return Gare
     */
    public function setAutreSncf($autreSncf)
    {
        $this->autreSncf = $autreSncf;

        return $this;
    }

    /**
     * Get autreSncf
     *
     * @return boolean
     */
    public function getAutreSncf()
    {
        return $this->autreSncf;
    }

    /**
     * Set mapZoom
     *
     * @param boolean $mapZoom
     *
     * @return Gare
     */
    public function setMapZoom($mapZoom)
    {
        $this->mapZoom = $mapZoom;

        return $this;
    }

    /**
     * Get mapZoom
     *
     * @return boolean
     */
    public function getMapZoom()
    {
        return $this->mapZoom;
    }

    /**
     * Set mapLatitude
     *
     * @param string $mapLatitude
     *
     * @return Gare
     */
    public function setMapLatitude($mapLatitude)
    {
        $this->mapLatitude = $mapLatitude;

        return $this;
    }

    /**
     * Get mapLatitude
     *
     * @return string
     */
    public function getMapLatitude()
    {
        return $this->mapLatitude;
    }

    /**
     * Set mapLongitude
     *
     * @param string $mapLongitude
     *
     * @return Gare
     */
    public function setMapLongitude($mapLongitude)
    {
        $this->mapLongitude = $mapLongitude;

        return $this;
    }

    /**
     * Get mapLongitude
     *
     * @return string
     */
    public function getMapLongitude()
    {
        return $this->mapLongitude;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return Gare
     */
    public function setVille(\AppBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Add compagnie
     *
     * @param \AppBundle\Entity\Compagnie $compagnie
     *
     * @return Gare
     */
    public function addCompagnie(\AppBundle\Entity\Compagnie $compagnie)
    {
        $this->compagnies[] = $compagnie;

        return $this;
    }

    /**
     * Remove compagnie
     *
     * @param \AppBundle\Entity\Compagnie $compagnie
     */
    public function removeCompagnie(\AppBundle\Entity\Compagnie $compagnie)
    {
        $this->compagnies->removeElement($compagnie);
    }

    /**
     * Get compagnies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompagnies()
    {
        return $this->compagnies;
    }
}

