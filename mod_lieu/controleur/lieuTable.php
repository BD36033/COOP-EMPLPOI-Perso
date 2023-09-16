<?php
Class LieuTable
{
    private $id = "";
    private $nom = "";
    private $adresse1 = "";
    private $adresse2 = "";
    private $adresse3 = "";
    private $adresse4 = "";
    private $codepostal = "";
    private $ville = "";
    private $contact = "";
    private $telephone = "";
    private $capaciteaccueil = "";
    private $datecreation = "";
    private $datemodification = "";

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSuccess = "";

    public function __construct($data = null)
    {
        //$data est un tableau
        if ($data != null) {
            $this->hydrater($data);
        }
    }

    public function hydrater(array $row)
    {
        foreach ($row as $k => $v) {
            $setter = 'set' . ucfirst($k);
            if (method_exists($this, $setter)) {
                $this->$setter($v);
            }
        }
    }


    //Getter

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @return string
     */
    public function getAdresse1(): string
    {
        return $this->adresse1;
    }

    /**
     * @return string
     */
    public function getAdresse2(): string
    {
        return $this->adresse2;
    }

    /**
     * @return string
     */
    public function getAdresse3(): string
    {
        return $this->adresse3;
    }

    /**
     * @return string
     */
    public function getAdresse4(): string
    {
        return $this->adresse4;
    }

    /**
     * @return string
     */
    public function getCodePostal(): string
    {
        return $this->codepostal;
    }

    /**
     * @return string
     */
    public function getVille(): string
    {
        return $this->ville;
    }

    /**
     * @return string
     */
    public function getContact(): string
    {
        return $this->contact;
    }

    /**
     * @return string
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /**
     * @return string
     */
    public function getCapaciteAccueil(): string
    {
        return $this->capaciteaccueil;
    }

    /**
     * @return string
     */
    public function getDateCreation(): string
    {
        return $this->datecreation;
    }

    /**
     * @return string
     */
    public function getDateModification(): string
    {
        return $this->datemodification;
    }

    /**
     * @return bool
     */
    public function getAutorisationBD(): string
    {
        return $this->autorisationBD;
    }

    /**
     * @return string
     */
    public static function getMessageSuccess(): string
    {
        return self::$messageSuccess;
    }

    /**
     * @return string
     */
    public static function getMessageErreur(): string
    {
        return self::$messageErreur;
    }


    //Setter

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @param string $adresse1
     */
    public function setAdresse1(string $adresse1): void
    {
        $this->adresse1 = $adresse1;
    }

    /**
     * @param string $adresse2
     */
    public function setAdresse2(string $adresse2): void
    {
        $this->adresse2 = $adresse2;
    }

    /**
     * @param string $adresse3
     */
    public function setAdresse3(string $adresse3): void
    {
        $this->adresse3 = $adresse3;
    }

    /**
     * @param string $adresse4
     */
    public function setAdresse4(string $adresse4): void
    {
        $this->adresse4 = $adresse4;
    }

    /**
     * @param string $codepostal
     */
    public function setCodepostal(string $codepostal): void
    {
        $this->codepostal = $codepostal;
    }

    /**
     * @param string $ville
     */
    public function setVille(string $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @param string $contact
     */
    public function setContact(string $contact): void
    {
        $this->contact = $contact;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone(string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @param string $capaciteaccueil
     */
    public function setCapaciteaccueil(string $capaciteaccueil): void
    {
        $this->capaciteaccueil = $capaciteaccueil;
    }

    /**
     * @param string $datecreation
     */
    public function setDatecreation(string $datecreation): void
    {
        $this->datecreation = $datecreation;
    }

    /**
     * @param string $datemodification
     */
    public function setDatemodification(string $datemodification): void
    {
        $this->datemodification = $datemodification;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD(bool $autorisationBD): void
    {
        $this->autorisationBD = $autorisationBD;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur(string $messageErreur): void
    {
        self::$messageErreur = $messageErreur;
    }

    /**
     * @param string $messageSuccess
     */
    public static function setMessageSuccess(string $messageSuccess): void
    {
        self::$messageSuccess = $messageSuccess;
    }


}