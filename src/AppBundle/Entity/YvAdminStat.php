<?php

namespace AppBundle\Entity;

/**
 * YvAdminStat
 */
class YvAdminStat
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nbTelechargementPrec;

    /**
     * @var integer
     */
    private $nbTelechargement;

    /**
     * @var integer
     */
    private $nbCommentaires;

    /**
     * @var integer
     */
    private $nbNotes;

    /**
     * @var string
     */
    private $moyenneNotes;


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
     * Set nbTelechargementPrec
     *
     * @param integer $nbTelechargementPrec
     *
     * @return YvAdminStat
     */
    public function setNbTelechargementPrec($nbTelechargementPrec)
    {
        $this->nbTelechargementPrec = $nbTelechargementPrec;

        return $this;
    }

    /**
     * Get nbTelechargementPrec
     *
     * @return integer
     */
    public function getNbTelechargementPrec()
    {
        return $this->nbTelechargementPrec;
    }

    /**
     * Set nbTelechargement
     *
     * @param integer $nbTelechargement
     *
     * @return YvAdminStat
     */
    public function setNbTelechargement($nbTelechargement)
    {
        $this->nbTelechargement = $nbTelechargement;

        return $this;
    }

    /**
     * Get nbTelechargement
     *
     * @return integer
     */
    public function getNbTelechargement()
    {
        return $this->nbTelechargement;
    }

    /**
     * Set nbCommentaires
     *
     * @param integer $nbCommentaires
     *
     * @return YvAdminStat
     */
    public function setNbCommentaires($nbCommentaires)
    {
        $this->nbCommentaires = $nbCommentaires;

        return $this;
    }

    /**
     * Get nbCommentaires
     *
     * @return integer
     */
    public function getNbCommentaires()
    {
        return $this->nbCommentaires;
    }

    /**
     * Set nbNotes
     *
     * @param integer $nbNotes
     *
     * @return YvAdminStat
     */
    public function setNbNotes($nbNotes)
    {
        $this->nbNotes = $nbNotes;

        return $this;
    }

    /**
     * Get nbNotes
     *
     * @return integer
     */
    public function getNbNotes()
    {
        return $this->nbNotes;
    }

    /**
     * Set moyenneNotes
     *
     * @param string $moyenneNotes
     *
     * @return YvAdminStat
     */
    public function setMoyenneNotes($moyenneNotes)
    {
        $this->moyenneNotes = $moyenneNotes;

        return $this;
    }

    /**
     * Get moyenneNotes
     *
     * @return string
     */
    public function getMoyenneNotes()
    {
        return $this->moyenneNotes;
    }
}

