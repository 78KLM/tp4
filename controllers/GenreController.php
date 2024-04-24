<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $LesGenres=Genre::findAll();
            include ('vues/listeGenre.php');
        break;
    case 'add':
        $mode="Ajouter";
        include ('vues/formGenre.php');
        break;
    case 'update':
        $mode="Modifier";
        $genre=Genre::findById($_GET['num']);
        include ('vues/formGenre.php');
        break;

    case 'delete':
        $genre=Genre::findById($_GET['num']);
        $nb=Genre::delete($genre);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le genre a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le genre n'a pas bien été $message"];
        }
        header('location: index.php?uc=genre&action=list');
        exit();
    break;

    case 'valideForm':
        $genre = new Genre();
        if(empty($_POST['num'])) //cas d'un ajout
        {
            $genre->setLibelle($_POST['libelle']);
            $nb=Genre::add($genre);
            $message = "ajouté";
        }else { //cas modif
            $genre->setNum($_POST['num']);
            $genre->setLibelle($_POST['libelle']);
            $nb=Genre::update($genre);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le genre a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le genre n'a pas été $message"];
        }
        header('location: index.php?uc=genre&action=list');
        break;
}
?>