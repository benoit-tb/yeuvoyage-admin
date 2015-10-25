<?php

namespace AppBundle\Entity;

/**
 * YvAdminUserAction
 */
class YvAdminUserAction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idUser;

    /**
     * @var string
     */
    private $typeItem;

    /**
     * @var integer
     */
    private $idItem;

    /**
     * @var string
     */
    private $typeAction;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return YvAdminUserAction
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set typeItem
     *
     * @param string $typeItem
     *
     * @return YvAdminUserAction
     */
    public function setTypeItem($typeItem)
    {
        $this->typeItem = $typeItem;

        return $this;
    }

    /**
     * Get typeItem
     *
     * @return string
     */
    public function getTypeItem()
    {
        return $this->typeItem;
    }

    /**
     * Set idItem
     *
     * @param integer $idItem
     *
     * @return YvAdminUserAction
     */
    public function setIdItem($idItem)
    {
        $this->idItem = $idItem;

        return $this;
    }

    /**
     * Get idItem
     *
     * @return integer
     */
    public function getIdItem()
    {
        return $this->idItem;
    }

    /**
     * Set typeAction
     *
     * @param string $typeAction
     *
     * @return YvAdminUserAction
     */
    public function setTypeAction($typeAction)
    {
        $this->typeAction = $typeAction;

        return $this;
    }

    /**
     * Get typeAction
     *
     * @return string
     */
    public function getTypeAction()
    {
        return $this->typeAction;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return YvAdminUserAction
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
}

