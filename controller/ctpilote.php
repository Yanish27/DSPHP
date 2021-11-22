<?php

/*----------------------------------------------*/
/* fonction monTP Classe Pilote                 */
/*----------------------------------------------*/

function MonTPClassPilote()
{

    /* ------------ TP -----------------*/

    echo "----------   TP Classe 2 ---------------" . "<br>";
    echo "----------Création du pilote1 --------" . "<br>";
    /* initialisation avec un age de 52 */
    $pilote1 = new Pilote('Yanis', 'Halaoui','H',52,1987, 07, 12);
    /* la fonction getage() va calculer l'age correct en fonction de la date naissance */
    $pilote1->SePresenter();
    echo 'Age du pilote 1 calculé  '. $pilote1->getAge() . '<br>';
    echo "test get  date naissance pilote 1 " .   '<br>';
    echo $pilote1->getDatenaissance() .   '<br>';

    /* TP POO part 2 Alias et Clonage  */
    echo "Alias pilote1 en pilote2 " .   '<br>';
    $pilote2 = $pilote1;
    $pilote2->SePresenter();
    $pilote2->noms = 'Durand (le clone)';
    echo 'nom du Pilote 2 (clone) '. $pilote2->noms .   '<br>';
    echo 'nom du Pilote 1 (original) '. $pilote1->noms .   '<br>';
    echo "set datenaissance pilote 2 2000 04 14 " .   '<br>';
    $pilote2->setDatenaissanced(2000,04,14);
    echo 'Age du clone pilote 2 ' . $pilote2->getAge() .   '<br>';
    echo 'Age pilote 1 ' . $pilote1->getAge() .   '<br>';

    /* opérateur d'égalité   différence entre == et ==== */
   echo (' pilote 1 == pilote 2 ? ' . ($pilote1 == $pilote2)) .   '<br>';
    echo (' pilote 1 === pilote 2 ? ' . ($pilote1 === $pilote2)) .   '<br>';


    echo "Clonage pilote1 en pilote3 " .   '<br>';
    $pilote3 = clone($pilote1);

    /* opérateur d'égalité   différence entre == et === : le clonage crée vraiment un objet  */
    echo (' pilote1 == pilote3 ? ' . ($pilote1 == $pilote3)) .   '<br>';
    echo (' pilote1 === pilote3 ? ' . ($pilote1 === $pilote3)) .   '<br>';


    $pilote3->SePresenter();
    $pilote3->noms = 'Durand le vrai clone !';
    echo 'nom du Pilote 3 (clone) '. $pilote3->noms .   '<br>';
    echo 'nom du Pilote 1 (original) '. $pilote1->noms .   '<br>';

    $pilote1->setPrenoms('Luc');
    $pilote1->setNoms('Skywalker');
    echo 'nom du Pilote 1 '. $pilote1->noms .   '<br>';
    echo 'prenom du Pilote 1 '. $pilote1->prenoms .   '<br>';


    echo "set datenaissance pilote 3 1985 01 01 " .   '<br>';
    $pilote3->setDatenaissanced(2000,01,01);
    echo 'Age du clone pilote 3 ' . $pilote3->getAge() .   '<br>';
    echo 'Age pilote 1 ' . $pilote1->getAge() .   '<br>';
    /* ==> nécessité d'écrire la fonction __clone pour instancier une nouvelle date de naissance */
    /* spécifique au pilote 6 */

    /* exemple fonction get_class */
     echo 'Classe de Pilote1', get_class($pilote1)  .   '<br>';

}

function HydrateOnePilote()
{
    $Modele = new Modele();
    $GetOnePiloteResult = $Modele->GetOnePilote(4);
    /* ------------ TP -----------------*/
    $DataPilote1 = $GetOnePiloteResult->fetch(PDO::FETCH_ASSOC);
    echo "----------Création du pilote1 --------" . "<br>";
    $pilote1 = new Pilote($DataPilote1);
    $pilote1->SePresenter();

}

/*?> ommis car PHP only */