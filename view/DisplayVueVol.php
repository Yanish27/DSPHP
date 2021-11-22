<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <title>Liste des vols</title>
  </head>

  <body>
  <!-- <p><a href="index.php">Retour à l'index VueVol /a></p> -->
 <?php
    echo '</br>' . "résulat de la requête sur Vuevol ";
/* Fetch resulats and display */
    while ($row_vuevol = $vuevol_result->fetch()) {
		echo '<p>' . 'Départ ' . htmlspecialchars($row_vuevol['aeroportdepart']). ' Arrivée ' .
					  htmlspecialchars($row_vuevol['aeroportarrivee']). ' Date : ' .
					  htmlspecialchars($row_vuevol['datevols']) . ' Modèle ' . 
					  htmlspecialchars($row_vuevol['fabricant']). ' ' .
					  htmlspecialchars($row_vuevol['modeles']);
	}
	$vuevol_result->closeCursor();
?>
</body>
</html>