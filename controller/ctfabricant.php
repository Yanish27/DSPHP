<?php

public function ListeVueVolbyFabricant($Fabricant)
{
    $Fab = new FabricantDAO();
    $GetListeVueVolbyFabricant = $Modele->GetVueVolByFab($Fabricant);

    $DataFab1 = GetListeVueVolbyFabricant->fetch(PDO::FETCH_ASSOC);
    var_dump($DataFab1);
    
}