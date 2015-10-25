<?php

namespace AppBundle\Entity;

/**
 * SncfTrajets
 */
class SncfTrajets
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $horaireDepart;

    /**
     * @var \DateTime
     */
    private $horaireArrivee;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $destination;

    /**
     * @var \AppBundle\Entity\Ville
     */
    private $provenance;


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
     * Set horaireDepart
     *
     * @param \DateTime $horaireDepart
     *
     * @return SncfTrajets
     */
    public function setHoraireDepart($horaireDepart)
    {
        $this->horaireDepart = $horaireDepart;

        return $this;
    }

    /**
     * Get horaireDepart
     *
     * @return \DateTime
     */
    public function getHoraireDepart()
    {
        return $this->horaireDepart;
    }

    /**
     * Set horaireArrivee
     *
     * @param \DateTime $horaireArrivee
     *
     * @return SncfTrajets
     */
    public function setHoraireArrivee($horaireArrivee)
    {
        $this->horaireArrivee = $horaireArrivee;

        return $this;
    }

    /**
     * Get horaireArrivee
     *
     * @return \DateTime
     */
    public function getHoraireArrivee()
    {
        return $this->horaireArrivee;
    }

    /**
     * Set idDestination
     *
     * @param \AppBundle\Entity\Ville $destination
     *
     * @return SncfTrajets
     */
    public function setDestination(\AppBundle\Entity\Ville $destination = null)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * Get idDestination
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * Set provenance
     *
     * @param \AppBundle\Entity\Ville $provenance
     *
     * @return SncfTrajets
     */
    public function setProvenance(\AppBundle\Entity\Ville $provenance = null)
    {
        $this->provenance = $provenance;

        return $this;
    }

    /**
     * Get provenance
     *
     * @return \AppBundle\Entity\Ville
     */
    public function getProvenance()
    {
        return $this->provenance;
    }
}

