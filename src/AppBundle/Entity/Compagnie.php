<?php

namespace AppBundle\Entity;

/**
 * Compagnie
 */
class Compagnie
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
    private $telephone;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idGare;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idGare = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Compagnie
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Compagnie
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
     * Set mail
     *
     * @param string $mail
     *
     * @return Compagnie
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
     * Set site
     *
     * @param string $site
     *
     * @return Compagnie
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Compagnie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add idGare
     *
     * @param \AppBundle\Entity\YvGare $idGare
     *
     * @return Compagnie
     */
    public function addIdGare(\AppBundle\Entity\YvGare $idGare)
    {
        $this->idGare[] = $idGare;

        return $this;
    }

    /**
     * Remove idGare
     *
     * @param \AppBundle\Entity\YvGare $idGare
     */
    public function removeIdGare(\AppBundle\Entity\YvGare $idGare)
    {
        $this->idGare->removeElement($idGare);
    }

    /**
     * Get idGare
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdGare()
    {
        return $this->idGare;
    }
}

