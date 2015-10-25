<?php

namespace AppBundle\Entity;

/**
 * YvUtilisateur
 */
class YvUtilisateur
{
    /**
     * @var integer
     */
    private $uid;

    /**
     * @var string
     */
    private $uniqueId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $encryptedPassword;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var string
     */
    private $civilite;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var boolean
     */
    private $autoriseCompagnieYeuCont = '1';

    /**
     * @var boolean
     */
    private $autoriseCompagnieVendeenne = '1';

    /**
     * @var boolean
     */
    private $autoriseNgv = '1';

    /**
     * @var boolean
     */
    private $autoriseNr = '1';

    /**
     * @var boolean
     */
    private $autoriseCargo = '1';

    /**
     * @var boolean
     */
    private $autoriseHoraireFacultatif = '1';

    /**
     * @var string
     */
    private $autorisePlacement = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $idTrajet;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTrajet = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get uid
     *
     * @return integer
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set uniqueId
     *
     * @param string $uniqueId
     *
     * @return YvUtilisateur
     */
    public function setUniqueId($uniqueId)
    {
        $this->uniqueId = $uniqueId;

        return $this;
    }

    /**
     * Get uniqueId
     *
     * @return string
     */
    public function getUniqueId()
    {
        return $this->uniqueId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return YvUtilisateur
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return YvUtilisateur
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set encryptedPassword
     *
     * @param string $encryptedPassword
     *
     * @return YvUtilisateur
     */
    public function setEncryptedPassword($encryptedPassword)
    {
        $this->encryptedPassword = $encryptedPassword;

        return $this;
    }

    /**
     * Get encryptedPassword
     *
     * @return string
     */
    public function getEncryptedPassword()
    {
        return $this->encryptedPassword;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return YvUtilisateur
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set civilite
     *
     * @param string $civilite
     *
     * @return YvUtilisateur
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return YvUtilisateur
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return YvUtilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return YvUtilisateur
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return YvUtilisateur
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set autoriseCompagnieYeuCont
     *
     * @param boolean $autoriseCompagnieYeuCont
     *
     * @return YvUtilisateur
     */
    public function setAutoriseCompagnieYeuCont($autoriseCompagnieYeuCont)
    {
        $this->autoriseCompagnieYeuCont = $autoriseCompagnieYeuCont;

        return $this;
    }

    /**
     * Get autoriseCompagnieYeuCont
     *
     * @return boolean
     */
    public function getAutoriseCompagnieYeuCont()
    {
        return $this->autoriseCompagnieYeuCont;
    }

    /**
     * Set autoriseCompagnieVendeenne
     *
     * @param boolean $autoriseCompagnieVendeenne
     *
     * @return YvUtilisateur
     */
    public function setAutoriseCompagnieVendeenne($autoriseCompagnieVendeenne)
    {
        $this->autoriseCompagnieVendeenne = $autoriseCompagnieVendeenne;

        return $this;
    }

    /**
     * Get autoriseCompagnieVendeenne
     *
     * @return boolean
     */
    public function getAutoriseCompagnieVendeenne()
    {
        return $this->autoriseCompagnieVendeenne;
    }

    /**
     * Set autoriseNgv
     *
     * @param boolean $autoriseNgv
     *
     * @return YvUtilisateur
     */
    public function setAutoriseNgv($autoriseNgv)
    {
        $this->autoriseNgv = $autoriseNgv;

        return $this;
    }

    /**
     * Get autoriseNgv
     *
     * @return boolean
     */
    public function getAutoriseNgv()
    {
        return $this->autoriseNgv;
    }

    /**
     * Set autoriseNr
     *
     * @param boolean $autoriseNr
     *
     * @return YvUtilisateur
     */
    public function setAutoriseNr($autoriseNr)
    {
        $this->autoriseNr = $autoriseNr;

        return $this;
    }

    /**
     * Get autoriseNr
     *
     * @return boolean
     */
    public function getAutoriseNr()
    {
        return $this->autoriseNr;
    }

    /**
     * Set autoriseCargo
     *
     * @param boolean $autoriseCargo
     *
     * @return YvUtilisateur
     */
    public function setAutoriseCargo($autoriseCargo)
    {
        $this->autoriseCargo = $autoriseCargo;

        return $this;
    }

    /**
     * Get autoriseCargo
     *
     * @return boolean
     */
    public function getAutoriseCargo()
    {
        return $this->autoriseCargo;
    }

    /**
     * Set autoriseHoraireFacultatif
     *
     * @param boolean $autoriseHoraireFacultatif
     *
     * @return YvUtilisateur
     */
    public function setAutoriseHoraireFacultatif($autoriseHoraireFacultatif)
    {
        $this->autoriseHoraireFacultatif = $autoriseHoraireFacultatif;

        return $this;
    }

    /**
     * Get autoriseHoraireFacultatif
     *
     * @return boolean
     */
    public function getAutoriseHoraireFacultatif()
    {
        return $this->autoriseHoraireFacultatif;
    }

    /**
     * Set autorisePlacement
     *
     * @param string $autorisePlacement
     *
     * @return YvUtilisateur
     */
    public function setAutorisePlacement($autorisePlacement)
    {
        $this->autorisePlacement = $autorisePlacement;

        return $this;
    }

    /**
     * Get autorisePlacement
     *
     * @return string
     */
    public function getAutorisePlacement()
    {
        return $this->autorisePlacement;
    }

    /**
     * Add idTrajet
     *
     * @param \AppBundle\Entity\Trajet $idTrajet
     *
     * @return YvUtilisateur
     */
    public function addIdTrajet(\AppBundle\Entity\Trajet $idTrajet)
    {
        $this->idTrajet[] = $idTrajet;

        return $this;
    }

    /**
     * Remove idTrajet
     *
     * @param \AppBundle\Entity\Trajet $idTrajet
     */
    public function removeIdTrajet(\AppBundle\Entity\Trajet $idTrajet)
    {
        $this->idTrajet->removeElement($idTrajet);
    }

    /**
     * Get idTrajet
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdTrajet()
    {
        return $this->idTrajet;
    }
}

