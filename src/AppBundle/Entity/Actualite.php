<?php

namespace AppBundle\Entity;

/**
 * Actualite
 */
class Actualite
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $siteWeb;

    /**
     * @var \AppBundle\Entity\ActualiteType
     */
    private $type;

    /**
     * @var \DateTime
     */
    private $dateDebutAffichage;

    /**
     * @var \DateTime
     */
    private $dateFinAffichage;

    /**
     * @var boolean
     */
    private $afficherAccueil = '0';


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->date = new \DateTime();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Actualite
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Actualite
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Actualite
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set siteWeb
     *
     * @param string $siteWeb
     *
     * @return Actualite
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
     * Set type
     *
     * @param \AppBundle\Entity\ActualiteType $type
     *
     * @return Trajet
     */
    public function setType(\AppBundle\Entity\ActualiteType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\ActualiteType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateDebutAffichage
     *
     * @param \DateTime $dateDebutAffichage
     *
     * @return Actualite
     */
    public function setDateDebutAffichage($dateDebutAffichage)
    {
        $this->dateDebutAffichage = $dateDebutAffichage;

        return $this;
    }

    /**
     * Get dateDebutAffichage
     *
     * @return \DateTime
     */
    public function getDateDebutAffichage()
    {
        return $this->dateDebutAffichage;
    }

    /**
     * Set dateFinAffichage
     *
     * @param \DateTime $dateFinAffichage
     *
     * @return Actualite
     */
    public function setDateFinAffichage($dateFinAffichage)
    {
        $this->dateFinAffichage = $dateFinAffichage;

        return $this;
    }

    /**
     * Get dateFinAffichage
     *
     * @return \DateTime
     */
    public function getDateFinAffichage()
    {
        return $this->dateFinAffichage;
    }

    /**
     * Set afficherAccueil
     *
     * @param boolean $afficherAccueil
     *
     * @return Actualite
     */
    public function setAfficherAccueil($afficherAccueil)
    {
        $this->afficherAccueil = $afficherAccueil;

        return $this;
    }

    /**
     * Get afficherAccueil
     *
     * @return boolean
     */
    public function getAfficherAccueil()
    {
        return $this->afficherAccueil;
    }
}

