<?php

namespace AppBundle\Entity;

/**
 * YvAdminConfig
 */
class YvAdminConfig
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $numVersion;

    /**
     * @var boolean
     */
    private $afficherMessageAccueil = '0';

    /**
     * @var string
     */
    private $titreMessageAccueil;

    /**
     * @var string
     */
    private $descriptionMessageAccueil;


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
     * Set numVersion
     *
     * @param string $numVersion
     *
     * @return YvAdminConfig
     */
    public function setNumVersion($numVersion)
    {
        $this->numVersion = $numVersion;

        return $this;
    }

    /**
     * Get numVersion
     *
     * @return string
     */
    public function getNumVersion()
    {
        return $this->numVersion;
    }

    /**
     * Set afficherMessageAccueil
     *
     * @param boolean $afficherMessageAccueil
     *
     * @return YvAdminConfig
     */
    public function setAfficherMessageAccueil($afficherMessageAccueil)
    {
        $this->afficherMessageAccueil = $afficherMessageAccueil;

        return $this;
    }

    /**
     * Get afficherMessageAccueil
     *
     * @return boolean
     */
    public function getAfficherMessageAccueil()
    {
        return $this->afficherMessageAccueil;
    }

    /**
     * Set titreMessageAccueil
     *
     * @param string $titreMessageAccueil
     *
     * @return YvAdminConfig
     */
    public function setTitreMessageAccueil($titreMessageAccueil)
    {
        $this->titreMessageAccueil = $titreMessageAccueil;

        return $this;
    }

    /**
     * Get titreMessageAccueil
     *
     * @return string
     */
    public function getTitreMessageAccueil()
    {
        return $this->titreMessageAccueil;
    }

    /**
     * Set descriptionMessageAccueil
     *
     * @param string $descriptionMessageAccueil
     *
     * @return YvAdminConfig
     */
    public function setDescriptionMessageAccueil($descriptionMessageAccueil)
    {
        $this->descriptionMessageAccueil = $descriptionMessageAccueil;

        return $this;
    }

    /**
     * Get descriptionMessageAccueil
     *
     * @return string
     */
    public function getDescriptionMessageAccueil()
    {
        return $this->descriptionMessageAccueil;
    }
}

