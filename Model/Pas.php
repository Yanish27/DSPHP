<?php
declare(strict_types=1);


class Pas
    /*---------------*/
    /* CLASSE PAS */
    /*---------------*/
{
    public static int $Nbpas = 0;

     /* static class functions */
    public static function ComptePas(): void
    {
        self::$Nbpas++;
    }


   /* constructeur  TP 3 */

    public function __construct()
    {
        self::ComptePas();
    }


}
