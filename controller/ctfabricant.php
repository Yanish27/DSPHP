<?php

function ListeVueVolbyFabricant($fab)
{
    
    $Fabricant = new FabricantDAO();
    var_dump($Fabricant->GetVueVolByFab($fab));

}