<?php
 require('Model/pas.php');

/*----------------------------------------------*/
/* fonction monTPClassPas                       */
/*----------------------------------------------*/

function MonTPClassPas()
{
    echo "----------   TP Classe Pas : compte le nombre d'objet PAS ------" . "<br>";
    $Pas1 = new Pas;
    $Pas2 = new Pas;
    $Pas3 = new Pas;
    echo "Nombre d'objets de classe PAS " . "<br>";
    echo Pas::$Nbpas;

}

/*?> ommis car PHP only */