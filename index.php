 <?php
require_once('autoloader.php');
Autoloader::register();
session_start(); 

require('Menuprincipal.php');
require('controller/ctpilote.php');
require('controller/ctpas.php');
require('controller/ctfabricant.php');


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'AfficherMonTP') {
        MonTPClassPilote();
	}
    if ($_GET['action'] == 'AfficherNbPas') {
        MonTPClassPas();
    }
    if ($_GET['action'] == 'hydrateOnePilote') {
        HydrateOnePilote();
    }
    if ($_GET['action'] == 'AskVueVolByFab') {
        ListeVueVolbyFabricant($_POST['fab']);
    }
}


/*?> ommis car PHP only */