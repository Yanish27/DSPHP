<?php

function ListeVueVolbyFabricant($fab)
{
    
    $Fabricant = new FabricantDAO();
    //var_dump($Fabricant->GetVueVolByFab($fab));
    //print($Fabricant->GetVueVolByFab($fab)[0]['numvoli']);

    foreach($Fabricant->GetVueVolByFab($fab) as $v)
    {
        ?> 
    <table>
        <style>
        table
        {
            border-collapse: collapse; /* Les bordures du tableau seront collées (plus joli) */
        }
        td
        {
            border: 1px solid black;
        }
        </style>
        <tr>
            <th>Numéro de vol</th>
            <th>Aéroport départ</th>
            <th>Aéroport arrivé</th>
            <th>Date vol</th>
            <th>Heure départ</th>
            <th>Heure arrivée</th>
            <th>Date révision</th>
            <th>Fabricant</th>
            <th>Modèle</th>
            <th>Version</th>
        </tr>
        <tr>
            <?php
                print("<td>".$v['numvoli'])."</td>"; 
                print("<td>".$v['aeroportdeparts']."</td>");
                print("<td>".$v['aeroportarrives']."</td>");
                print("<td>".$v['datevols']."</td>");
                print("<td>".$v['heuredeparth']."</td>");
                print("<td>".$v['heurearriveeh']."</td>");
                print("<td>".$v['daterevisiond']."</td>");
                print("<td>".$v['fabricants']."</td>");
                print("<td>".$v['modeles']."</td>");
                print("<td>".$v['versions']."</td>");
            ?>
        </tr>
    </table>
    <?php
    }

}