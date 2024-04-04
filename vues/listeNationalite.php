<!-- titre -->
<div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des nationalités</h2></div>
            <div class="col-3"><a href='index.php?uc=nationalite&action=add' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée une nationalité <a></div>



  <form action="" method="post" class="border border-primary rounded p-3 mt-3 mb-3" >
    <div class="row">
      <div class="col">
      <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value='<?php $libelle="";  if ($libelle != ""){echo $libelle;} ?>'>
       <!-- ($libelle != "")-->
      </div>
      <div class="col">
      <select name="continent" class='form-controle'> 
              <?php 
              echo "<option value='Tous'>Tout les contients</option>";
              foreach($LesContinents as $continent){
                $continentSel="";
                $selection=$continent->getNum() == $continentSel ? 'selected' : '';
                echo "<option value='".$continent->getNum()."' $selection >".$continent->getLibelle()."</option>";
              }
              ?>
              
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
                <?php foreach ($LesNationalites as $nationalite) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$nationalite->num </td>";
                    echo "<td class='col-md-4'>$nationalite->libNat</td>";
                    echo "<td class='col-md-3'>$nationalite->libCont</td>";
                    echo "<td class='col-md-3'>
                    <a href='index.php?uc=nationalite&action=update&num=".$nationalite->num."' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité <a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer cette nationalité ?' data-suppr='index.php?uc=nationalite&action=delete&num=" .$nationalite->num."' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité <a>
                    </td>";
                    echo "</tr>" ;
                ///supprNat.php?num=$nationalite->num
                }
                ?>
                

            </tbody>
            </table>
    </div>