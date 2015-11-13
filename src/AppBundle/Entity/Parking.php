<?php

namespace AppBundle\Entity;

/**
 * Parking
 */
class Parking
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
     * @var string
     */
    private $latitude;

    /**
     * @var string
     */
    private $longitude;

    /**
     * @var integer
     */
    private $zoommap;

    /**
     * @var string
     */
    private $distanceGare;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var string
     */
    private $telephone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $siteWeb;

    /**
     * @var string
     */
    private $dateOuverture;

    /**
     * @var string
     */
    private $prestations;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $ville;

    /**
     * @var \AppBundle\Entity\ParkingType
     */
    private $typeParking;

    /**
     * @var \AppBundle\Entity\Gare
     */
    private $gare;


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
     * @return Parking
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
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Parking
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     *
     * @return Parking
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set zoommap
     *
     * @param integer $zoommap
     *
     * @return Parking
     */
    public function setZoommap($zoommap)
    {
        $this->zoommap = $zoommap;

        return $this;
    }

    /**
     * Get zoommap
     *
     * @return integer
     */
    public function getZoommap()
    {
        return $this->zoommap;
    }

    /**
     * Set distanceGare
     *
     * @param string $distanceGare
     *
     * @return Parking
     */
    public function setDistanceGare($distanceGare)
    {
        $this->distanceGare = $distanceGare;

        return $this;
    }

    /**
     * Get distanceGare
     *
     * @return string
     */
    public function getDistanceGare()
    {
        return $this->distanceGare;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Parking
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Parking
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Parking
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Parking
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Parking
     */
    public function setSiteWeb($siteWeb)
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    /**
     * Get siteWeb
     *
     * @return string
     */
    public function getSiteWeb()
    {
        return $this->siteWeb;
    }

    /**
     * Set dateOuverture
     *
     * @param string $dateOuverture
     *
     * @return Parking
     */
    public function setDateOuverture($dateOuverture)
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    /**
     * Get dateOuverture
     *
     * @return string
     */
    public function getDateOuverture()
    {
        return $this->dateOuverture;
    }

    /**
     * Set prestations
     *
     * @param string $prestations
     *
     * @return Parking
     */
    public function setPrestations($prestations)
    {
        $this->prestations = $prestations;

        return $this;
    }

    /**
     * Get prestations
     *
     * @return string
     */
    public function getPrestations()
    {
        return $this->prestations;
    }

    /**
     * Set typeParking
     *
     * @param \AppBundle\Entity\ParkingType $typeParking
     *
     * @return Parking
     */
    public function setTypeParking(\AppBundle\Entity\ParkingType $typeParking = null)
    {
        $this->typeParking = $typeParking;

        return $this;
    }

    /**
     * Get typeParking
     *
     * @return \AppBundle\Entity\ParkingType
     */
    public function getTypeParking()
    {
        return $this->typeParking;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Ville $ville
     *
     * @return Parking
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
     * Set gare
     *
     * @param \AppBundle\Entity\Gare $gare
     *
     * @return Parking
     */
    public function setGare(\AppBundle\Entity\Gare $gare = null)
    {
        $this->gare = $gare;

        return $this;
    }

    /**
     * Get gare
     *
     * @return \AppBundle\Entity\Gare
     */
    public function getGare()
    {
        return $this->gare;
    }
}

