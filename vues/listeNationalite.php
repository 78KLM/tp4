<?php
// Assurez-vous que les valeurs de $libelle et $continentSel sont correctement récupérées depuis le formulaire
$libelle = $_POST['libelle'] ?? '';
$continentSel = $_POST['continent'] ?? 'Tous';

// Incluez le fichier Continent.php pour pouvoir accéder à la classe Continent
include_once('modeles/Continent.php');

// Récupérez la liste des continents
$lesContinents = Continent::findALL();

// Incluez la classe Nationalite pour pouvoir accéder à la méthode findALL
include_once('modeles/Nationalite.php');

// Récupérez la liste des nationalités en fonction des paramètres de recherche
$lesNationalites = Nationalite::findALL($libelle, $continentSel);
?>
<div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des nationalités</h2></div>
            <div class="col-3"><a href='index.php?uc=nationalite&action=add' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée une nationalité </a></div>



  <form action="" method="post" class="border border-primary rounded p-3 mt-3 mb-3" >
    <div class="row">
      <div class="col">
      <input type='text' name='libelle' id='libelle' class='form-control' placehoder='Saisir le libellé' value='<?php if ($libelle != ""){echo $libelle;} ?>'>
       <!-- ($libelle != "")-->
      </div>
      <div class="col">
      <select name="continent" class='form-control'> 
                    <option value='Tous'>Tous les continents</option>
                    <?php foreach($lesContinents as $continent): ?>
                        <?php $selected = ($continent->getNum() == $continentSel) ? 'selected' : ''; ?>
                        <option value='<?php echo $continent->getNum(); ?>' <?php echo $selected; ?>><?php echo $continent->getLibelle(); ?></option>
                    <?php endforeach; ?>
              
            </select>
      </div>
      <div class="col">
        <button type="submit" class="btn btn-warning btn-block">Rechercher </button>
      </div>
    </div>
  </form>



        </div>
        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-4">Libellé</th>
                <th scope="col" class="col-md-3">Continent</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lesNationalites as $nationalite) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$nationalite->numero </td>";
                    echo "<td class='col-md-4'>$nationalite->libNation</td>";
                    echo "<td class='col-md-3'>$nationalite->libContinent</td>";
                    echo "<td class='col-md-3'>
                    <a href='index.php?uc=nationalite&action=update&num=".$nationalite->numero."' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité </a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer cette nationalité ?' data-suppr='index.php?uc=nationalite&action=delete&num=" .$nationalite->numero."' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité </a>
                    </td>";
                    echo "</tr>" ;
                ///supprNat.php?num=$nationalite->num
                }
                ?>
                

            </tbody>
            </table>
    </div>