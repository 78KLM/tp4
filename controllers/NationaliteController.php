<?php 
$action=$_GET['action'];
switch($action){
    case 'list':
            $LesNationalites=Nationalite::findAll();
            $LesContinents=Continent::findAll();
            if(!empty($_POST)){
                $libelle = $_POST['libelle'];
                $continentSel=$_POST['continent'];
                if ($libelle != "") {$textReq.= " and nationalite.libelle like '%".$libelle."%'";}
                if ($continentSel != "Tous") {$textReq.= " and continent.num = ". $continentSel;} }
            include ('vues/listeNationalite.php');
        break;
    case 'add':
        $mode="Ajouter";
        include ('vues/formNationalite.php');
        break;
    case 'update':
        $mode="Modifier";
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
            $nb=Nationalite::add($nationalite);
            $message = "ajouté";
        }else { //cas modif
            $nationalite->setNum($_POST['num']);
            $nationalite->setLibelle($_POST['libelle']);
            $nb=Nationalite::update($nationalite);
            $message = "modifié";
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