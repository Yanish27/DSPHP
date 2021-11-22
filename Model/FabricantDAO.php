<?php
// On demande a importer le modèle Abstract
require_once 'Model/modelAbstract.php';

// La class FabricantDAO hérite de la class ModelAbstract
class FabricantDAO extends modelAbstract
{
    // On définit une fonction  GetVueVolByFab qui doit être public
    public function GetVueVolByFab($idFabricant)
    {
        // On prépare la requète
        $req = "SELECT * FROM vuevol WHERE fabricants = :fabricants ORDER BY aeroportdeparts";
        echo "La requete est :".$req;

        // On execute la requête
        $ResultatReq = $this->executerRequete($req, array(':fabricants' => $idFabricant));

        // On retourne le résultat
        return $ResultatReq;
    }
}