<?php

namespace AppBundle\Entity;

/**
 * ActualiteType
 */
class ActualiteType
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $label;


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
     * Set label
     *
     * @param string $label
     *
     * @return ActualiteType
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }
}

