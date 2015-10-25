<?php

namespace AppBundle\Entity;

/**
 * YvParking
 */
class YvParking
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idVille;

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
     * @var \AppBundle\Entity\YvParkingType
     */
    private $idTypeParking;

    /**
     * @var \AppBundle\Entity\YvGare
     */
    private $idGare;


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
     * Set idVille
     *
     * @param integer $idVille
     *
     * @return YvParking
     */
    public function setIdVille($idVille)
    {
        $this->idVille = $idVille;

        return $this;
    }

    /**
     * Get idVille
     *
     * @return integer
     */
    public function getIdVille()
    {
        return $this->idVille;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * @return YvParking
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
     * Set idTypeParking
     *
     * @param \AppBundle\Entity\YvParkingType $idTypeParking
     *
     * @return YvParking
     */
    public function setIdTypeParking(\AppBundle\Entity\YvParkingType $idTypeParking = null)
    {
        $this->idTypeParking = $idTypeParking;

        return $this;
    }

    /**
     * Get idTypeParking
     *
     * @return \AppBundle\Entity\YvParkingType
     */
    public function getIdTypeParking()
    {
        return $this->idTypeParking;
    }

    /**
     * Set idGare
     *
     * @param \AppBundle\Entity\YvGare $idGare
     *
     * @return YvParking
     */
    public function setIdGare(\AppBundle\Entity\YvGare $idGare = null)
    {
        $this->idGare = $idGare;

        return $this;
    }

    /**
     * Get idGare
     *
     * @return \AppBundle\Entity\YvGare
     */
    public function getIdGare()
    {
        return $this->idGare;
    }
}

