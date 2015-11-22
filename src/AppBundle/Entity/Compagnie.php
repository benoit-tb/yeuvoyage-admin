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
    private $gares;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->gares = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add gare
     *
     * @param \AppBundle\Entity\Gare $gare
     *
     * @return Compagnie
     */
    public function addGare(\AppBundle\Entity\Gare $gare)
    {
        $this->gares[] = $gare;

        return $this;
    }

    /**
     * Remove gare
     *
     * @param \AppBundle\Entity\Gare $gare
     */
    public function removeGare(\AppBundle\Entity\Gare $gare)
    {
        $this->gares->removeElement($gare);
    }

    /**
     * Get gare
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGares()
    {
        return $this->gares;
    }
}

