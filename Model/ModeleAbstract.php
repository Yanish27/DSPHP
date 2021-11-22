<?php

declare (strict_types=-1);

abstract class ModeleAbstract

{
	private bdd;

	protected function executerRequete ($sqln $params = null)
	{
		if ($params == null)
		{
			$resultat = $this ->dbconnect() ->query ($sql);

		}
		else
		{
			$resultat = $this->dbconnect()->prepare($sql);
			$resultat->execute($params);


		}
		return $resultat;
	}



}


/* -------------------------*/
    /* Db connection à Airsatz */ 
    /* -------------------------*/
    private function dbconnect()
    {
        if(is_null($this->bdd)){
        	try
        	{
          		$this->bdd = new PDO('mysql:host=localhost;dbname=airsatz', 'root', '',
                               array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          		echo "CONNECTION a AIRSATZ OK " . '</br>'; 
        	}
        	catch (Exception $e)
        	{
                die('Erreur de connection à la base : ' . $e->getMessage());
        	}
        }
        return $this->bdd;
    }