<?php

namespace AppBundle\Entity;

/**
 * TypeBateau
 */
class TypeBateau
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
    private $dureeTraversee;

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
     * @return TypeBateau
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
     * Set dureeTraversee
     *
     * @param integer $dureeTraversee
     *
     * @return TypeBateau
     */
    public function setDureeTraversee($dureeTraversee)
    {
        $this->dureeTraversee = $dureeTraversee;

        return $this;
    }

    /**
     * Get dureeTraversee
     *
     * @return integer
     */
    public function getDureeTraversee()
    {
        return $this->dureeTraversee;
    }

    /**
     * Set compagnie
     *
     * @param \AppBundle\Entity\Compagnie $compagnie
     *
     * @return TypeBateau
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

