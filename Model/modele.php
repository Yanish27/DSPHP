<?php

class Modele{

    private $bdd;
    /*-----------------------------------*/
    /* Chargement donnée table Pilote    */
    /*-----------------------------------*/
    public function GetOnePilote($idpiloti)
    {
        $this->bdd = $this->dbconnect();

        /* Query */
        $resquest = 'select * from pilote WHERE idpiloti = :idpiloti ';
        echo 'requete = ' . $resquest;
        $GetOnePiloteResult = $this->bdd->prepare($resquest);
        $GetOnePiloteResult->execute(array('idpiloti' => $idpiloti));

        return $GetOnePiloteResult;
    }

    /* -------------------------*/
    /* Db connection à Airsatz */ 
    /* -------------------------*/
    private function dbconnect()
    {
        if(is_null($this->bdd)){
        	try
        	{
          		$this->bdd = new PDO('mysql:host=localhost;dbname=airsatz', 'root', '',
                               array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          		echo "CONNECTION a AIRSATZ OK " . '</br>'; 
        	}
        	catch (Exception $e)
        	{
                die('Erreur de connection à la base : ' . $e->getMessage());
        	}
        }
        return $this->bdd;
    }
}
?>