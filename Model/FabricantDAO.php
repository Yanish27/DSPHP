<?php



// La class FabricantDAO hérite de la class ModelAbstract
class FabricantDAO extends ModeleAbstract
{
    // On définit une fonction  GetVueVolByFab qui doit être public
    public function GetVueVolByFab($idFabricant)
    {

                
        // On prépare la requète

        $req = 'SELECT * FROM vuevol WHERE fabricants = "'.$idFabricant.'" ORDER BY aeroportdeparts;';
        echo "La requete est : ".$req;
        echo "<br>";


        // On execute la requête
        $ResultatReq = $this->executerRequete($req);
        $abc = $ResultatReq->fetchAll();
        // On retourne le résultat
        return $abc;
    }
}
