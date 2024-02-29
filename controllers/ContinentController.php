<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $LesContinents=$Continent::findAll();
            include "vues/listeContinent.php";
        break;
    case 'add':
        # code...
        break;
    case 'update':
        # code...
        break;

    case 'delete':
        # code...
        break;
}
?>