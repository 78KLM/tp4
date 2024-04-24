<?php 
$action=$_GET['action'];

switch($action){
    case 'list':
            $libelle='';
            $continentSel="Tous";
            if(!empty($_POST['libelle']) || !empty($_POST['continent'])){
                $libelle= $_POST['libelle'];
                $continentSel= $_POST['continent'];
            }
            $lesContinents=Continent::findALL($libelle, $continentSel);
    
            $lesNationalites = Nationalite::findALL();
            include ('vues/listeNationalite.php');
        break;
    case 'add':
        $mode="Ajouter";
        $LesContinents=Continent::findAll();
        include ('vues/formNationalite.php');
        break;
    case 'update':
        $mode="Modifier";
        $LesContinents=Continent::findAll();
        $nationalite=Nationalite::findById($_GET['num']);
        include ('vues/formNationalite.php');
        break;

    case 'delete':
        $nationalite=Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($nationalite);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le Nationalite a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le Nationalite n'a pas bien été $message"];
        }
        header('location: index.php?uc=nationalite&action=list');
        exit();
    break;

    case 'valideForm':
        $nationalite = new Nationalite();
        if(empty($_POST['num'])) //cas d'un ajout
        {
            $nationalite->setLibelle($_POST['libelle']);
            $continent = Continent::findById($_POST['continent']);
            $nationalite->setNumContinent($continent); 
            $nb = Nationalite::add($nationalite);
            $message = "ajouté";
        }else { //cas modif
            $nationalite->setNum($_POST['num']);
            $nationalite->setLibelle($_POST['libelle']);
            $continent = Continent::findById($_POST['continent']);
            $nationalite->setNumContinent($continent); 
            $nb = Nationalite::update($nationalite);
            $message = 'modifié';
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le nationalite a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le nationalite n'a pas été $message"];
        }
        header('location: index.php?uc=nationalite&action=list');
        break;
}
?>