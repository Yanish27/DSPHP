<?php


declare(strict_types=1);

class Pilote
    /*---------------*/
    /* CLASSE PILOTE */
    /*---------------*/
{
    public string $noms;
    public string $prenoms;
    private string $sexec;
    private Int $age;
    private DateTime $datenaissanced;
    private const annemin = 20;  /* utilisable avec self:: */
    private const annemax = 65;  /* utilisable avec self:: */

    /*--------------------------*/
    /* Public object functions  */
    /*--------------------------*/

    public function SePresenter(): void
    {
        echo "Bonjour je m'appelle ". $this->prenoms . " " .  $this->noms . '<br>';
        if (isset($this->age)) {
            echo "j'ai ". $this->age . "ans" . '<br>';
        }
        echo "je suis un  ". $this->sexec . '<br>';
        echo "j'ai   ". $this->getAge() .'ans ' . '<br>';
    }


     /* static class functions */
    public static function validerAge(Int $age): bool
    {
        if ($age < self::annemin || $age > self::annemax) {
            trigger_error(
                'L\' age doit être compris entre ' . self::annemin . ' et ' . self::annemax,
                E_USER_ERROR
            ) ;
        }
        return true;
    }

    public static function validerSexe(String $sexec): bool
    {
        if (strcmp($sexec, "H") != 0 &&
            strcmp($sexec, "F") != 0)  {
            trigger_error(
                'Le sexe doit être H ou F  ',
                E_USER_ERROR
            );
        }
        return true;
    }
    /*----------------------------------*/
    /* Private object functions         */
    /* appelable uniquement              */
    /*depuis une fonction de la classe  */
    /*----------------------------------*/
    private function CalculerAge(): int
    {
        $now = new DateTime;
        /* echo 'Now = '. $now->format('Y-m-d') . '<br>';*/
        $interval = $this->datenaissanced->diff($now);
        /*echo 'age calculé = ' . $interval->format('%Y') . '<br>';*/
        return (intval($interval->format('%Y')));
    }
    /*-----------------*/
    /* getter & setter */
    /*-----------------*/
    public function setAge(int $age) : void
    {
        self::validerAge($age);
        if ($age < self::annemin || $age > self::annemax) {
            trigger_error(
                'L\' age doit être compris entre 20 et 100 ',
                E_USER_ERROR
            );
        } else {
            $this->age = $age;
        }
    }
    /* fonction getAge() est dynamique : l'age est calculé automatiquement */
    /* en fonction de la date de naissance avec la fonction privée CalculerAge */
    public function getAge() : int
    {
        $this->age = $this->CalculerAge();
        return $this->age;
    }

    public function setSexec(String $sexec) : void
    {
        /*self::validerSexe($sexec);*/
        if (strcmp($sexec, "H") != 0 &&
            strcmp($sexec, "F") != 0)  {
            trigger_error(
                'Le sexe doit être H ou F  ',
                E_USER_ERROR
            );
        }
        else {
            $this->sexec = $sexec;
        }
    }
    public function getSexe() : string
    {
        return $this->sexec ;
    }

    /*   function setDatenaissance                          */
    /*   datenaissance est un objet de la classe DateTime   */
    /*   donc pour l'initialiser : new  DateTime            */
    public function setDatenaissanced(int $year, int $month, int $day) : void
    {
        if (isset($this->datenaissanced)) {
            $this->datenaissanced->setDate($year, $month, $day);
            /*echo 'modify date naissance  = ' . $this->datenaissanced->format('Y-m-d') . '<br>';*/
        }else
        {
            $date = strval($year). '-' .strval($month). '-' .strval($day);
            $this->datenaissanced = new DateTime($date);
            /*echo 'date naissance  = ' . $this->datenaissanced->format('Y-m-d') . '<br>';*/
        }
    }

    /* function setDatenaissanced                */
       public function getDatenaissance() : string
    {
        return $this->datenaissanced->format('Y-m-d');
    }

    public function setPrenoms(String $prenoms) : void
    {
        $this->prenoms = $prenoms;

    }
    public function setNoms(String $noms) : void
    {
        $this->noms = $noms;

    }
    /*-----------------------*/
    /* generic __get __set   */
    /*-----------------------*/

    public function __get($att){
        if ($att == 'age' ) {
            return $this->$att;
        }
        else if ($att == 'sexec' ) {
            return $this->$att;
        }
        else if ($att == 'noms' ) {
            return $this->$att;
        }
     else {
        echo "no getter for attribut " . $att . "<br>";
        }
    }

    public function __set($att, $value){
        if ($att == 'age' ) {
            $this->$att = $value;
        }
        else if ($att == 'sexec' ) {
            $this->$att = $value;
        }
        else if ($att == 'noms' ) {
            $this->$noms = $value;
        }
        else {
            echo "no setter for attribut " . $att . "<br>";
        }
    }

/* fonction __clone _ indispensable pour cloner un objet car l'attribut datenaissance doit être instancié */

    public function __clone(){
        $this->datenaissanced = new DateTime('now');
    }

     /* Ancien constructeur  valable jusqu'au Travail 3 du cours POO en PHP 2 */
/*
    public function __construct(String $noms, string $prenoms, string $sexec, int $age,
                                int $year, int $month, int $day)
    {
        $this->noms = $noms;
        $this->prenoms = $prenoms;
        $this->setDatenaissanced($year, $month, $day);
        $this->setAge($age);
        $this->setSexec($sexec);

    }
*/
    /* nouveau constructeur qui utilise la fonction hydrate() : un objet pilote est instancié */
    /* puis alimenté directement à partir de la base de donnée */

    public function __construct(array $OnePilote)
    {
        $this->hydrate($OnePilote);
    }


    /* hydratation   POO Part 2 TP 2  */
    /* la fonction hydrate est privée, elle n'est appellée que depuis le constructeur du pilote */
    /*---------------------------------*/

    private function hydrate(array $OnePilote)
    {
        echo 'hydrate start ' . '<br>';
        echo 'full array  $OnePilote ' . '<br>';
        print_r ($OnePilote);
        foreach ($OnePilote as $key => $value)
        {
            echo '$key  ' . $key. '<br>';
            echo '$value  ' . $value. '<br>';

            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set'.ucfirst($key);

            // Si le setter correspondant existe
            if (method_exists($this, $method))
            {
                if (strcmp($key, 'datenaissanced')) {
                    // On appelle le setter dans le cas général
                    $this->$method($value);
                }
                else {
                    /* pour la datenaissance, pas de setter, il faut d'abord créer un nouveau objet DateTime */
                    /* avec date_create*/
                    $this->datenaissanced = date_create($value);
                }
            }
        }
    }




}
