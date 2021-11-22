<?php 
declare (strict_types=-1);
class PiloteDAO extends ModeleAbstract;

public function GetOnePilote($idpiloti)
{
    $this->bdd = $this->dbconnect();

    /* Query */
    $resquest = 'select * from pilote WHERE idpiloti = :idpiloti ';
    echo 'requete = ' . $resquest;
    $GetOnePiloteResult = $this->bdd->prepare($resquest);
    $GetOnePiloteResult-> $this->executerRequete(array('idpiloti' => $idpiloti));

    return $GetOnePiloteResult;
}
