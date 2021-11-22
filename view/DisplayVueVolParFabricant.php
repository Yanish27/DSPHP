<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <title>Liste des vols par fabricant</title>
</head>

<body>
<!-- <p><a href="index.php">Retour à l'index VueVol /a></p> -->
<?php
echo '</br>' . "résulat de la requête sur Vuevol ";
/* Fetch resulats and display */
while ($row_vuevol = $vuevolfab_result->fetch()) {
    echo '<p>'
        . 'Fabricant : ' . htmlspecialchars($row_vuevol['fabricant']). ' ' .
        htmlspecialchars($row_vuevol['aeroportdepart']). ' Arrivée ' .
        htmlspecialchars($row_vuevol['aeroportarrivee']). ' Date : ' .
        htmlspecialchars($row_vuevol['datevols']) . ' Modèle ' .
        htmlspecialchars($row_vuevol['modeles']);
}
$vuevolfab_result->closeCursor();
?>
</body>
</html>
