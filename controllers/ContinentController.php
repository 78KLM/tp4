<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $LesContinents=Continent::findAll();
            include ('vues/listeContinent.php');
        break;
    case 'add':
        $mode="Ajouter";
        include ('vues/formContinent.php');
        break;
    case 'update':
        $mode="Modifier";
        include ('vues/formContinent.php');
        break;

    case 'delete':
        # code...
        break;
    case 'valideForm':
        $continent = new Continent();
        if(empty($_POST['num'])) //cas d'un ajout
        {
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::add($continent);
            $message = "modifié";
        }else { //cas modif
            //$continent->setNum($_POST['num']);
            $continent->setLibelle($_POST['libelle']);
        }
        if($nb==1){
            $_SESSION['message']=["succes"=>"Le continent a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le continent n'a pas été $message"];
        }
        header('location: index.php?uc=continent&action=list');
        break;
}
?>