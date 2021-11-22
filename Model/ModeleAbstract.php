<?php



declare(strict_types=1);



abstract class modeleAbstract
/*------------------------------------------------------*/
/* CLASSE MODELE abstraite d'accès générique à la base */
/*------------------------------------------------------*/
{
// Objet PDO d'accès à la BD
private $bdd;



// Exécute une requête SQL éventuellement paramétrée
protected function executerRequete($sql, $params = null) {
if ($params == null) {
$resultat = $this->dbconnect()->query($sql); // exécution directe
}
else {
$resultat = $this->dbconnect()->prepare($sql); // requête préparée
$resultat->execute($params);
}
return $resultat;
}



/* -------------------------*/
/* Db connection à Airsatz */
/* -------------------------*/
private function dbconnect()
{
try {
$this->bdd = new PDO('mysql:host=localhost;dbname=airsatz', 'root', '',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
echo "CONNECTION a AIRSATZ OK " . '</br>';
return $this->bdd;
} catch (Exception $e) {
die('Erreur de connection à la base : ' . $e->getMessage());
}



}
}
?>