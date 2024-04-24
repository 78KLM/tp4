<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $LesAuteurs=Auteur::findAll();
            include ('vues/listeAuteur.php');
        break;
    case 'add':
        $mode="Ajouter";
        include ('vues/formAuteur.php');
        break;
    case 'update':
        $mode="Modifier";
        $auteur=Auteur::findById($_GET['num']);
        include ('vues/formAuteur.php');
        break;

    case 'delete':
        $auteur=Auteur::findById($_GET['num']);
        $nb=Auteur::delete($auteur);
        if($nb==1){
            $_SESSION['message']=["success"=>"L'auteur a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"L'auteur n'a pas bien été $message"];
        }
        header('location: index.php?uc=auteur&action=list');
        exit();
    break;

    case 'valideForm':
        $auteur = new Auteur();
        if(empty($_POST['num'])) //cas d'un ajout
        {
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $nb=Auteur::add($auteur);
            $message = "ajouté";
        }else { //cas modif
            $auteur->setNum($_POST['num']);
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $nb=Auteur::update($auteur);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"L'auteur a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"L'auteur n'a pas été $message"];
        }
        header('location: index.php?uc=auteur&action=list');
        break;
}
?>