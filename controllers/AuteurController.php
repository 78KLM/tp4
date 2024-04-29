<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $nom='';
            $prenom='';
            $natSel="Tous";
            $nom='';
            if(!empty($_POST['nom']) || !empty($_POST['prenom'])|| !empty($_POST['nationalite'])){
                $nom= $_POST['nom'];
                $prenom= $_POST['prenom'];
                $natSel= $_POST['nationalite'];
            }
            $lesAuteurs = Auteur::findAll($nom,$prenom);
            $lesNationalites = Nationalite::findALL($libelle, $natSel);

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
            $auteur->setNationalite($_POST['nationalite']);
            $nb=Auteur::add($auteur);
            $message = "ajouté";
        }else { //cas modif
            $auteur->setNum($_POST['num']);
            $auteur->setNom($_POST['nom']);
            $auteur->setPrenom($_POST['prenom']);
            $auteur->setNationalite($_POST['nationalite']);
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