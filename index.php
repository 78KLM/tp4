<?php ob_start();
 session_start(); 
include "vues/header.php";
include "modeles/Continent.php";
include "modeles/Nationalite.php";
include "modeles/Genre.php";
include "modeles/Auteur.php";
include "modeles/monPdo.php";
include "vues/messageFlash.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil' :
        include ('vues/accueil.php');
        break;

    case 'continents':
        include('controllers/ContinentController.php');
        break;
    
    case 'nationalite':
        include('controllers/NationaliteController.php');
        break;
    
    case 'genre':
       include('controllers/GenreController.php');
       break;
       
    case 'auteur':
        include('controllers/AuteurController.php');
        break;
    case 'livre':
        include('controllers/LivreController.php');
        break;
}

include "vues/footer.php"; ?>