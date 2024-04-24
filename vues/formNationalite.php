


<div class="container mt-5">
    <h2 class='pt-3 text-center'> <?php echo $mode ?> une nationalité</h2>
    <form action="index.php?uc=nationalite&action=valideForm<?php $mode ?>" method="post" class="col-md-6 offset-md-3 border border-primary p-3 rounded">
        <div class="form-group">
            <label for="libelle">Libellé</label>
            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé" name="libelle" value="<?php if($mode == 'Modifier') {  echo $nationalite->getLibelle(); } ?>">
        </div>

        <?php
          $selectedContinentId = ($mode == "modifier" && $nationalite->getNumContinent()) ? $nationalite->getNumContinent()->getNum() : '';
          ?>
      <div class='form-group'>
          <label for='continent'>Libellé du continent</label>
          <select name="continent" class='form-control'>
              <?php 
              //$LesContinents=Continent::findAll();
              foreach($LesContinents as $continent) {
                  $selected = ($continent->getNum() == $selectedContinentId) ? 'selected' : '';
                  echo "<option value='".$continent->getNum()."' $selected>".$continent->getLibelle()."</option>";
              }
              ?>
          </select> 
      </div>



        <input type='hidden' id='num' name='num' value=<?php if($mode == "Modifier"){ echo $nationalite->getNum();}?>>
        <div class='row'>
            <div class='col'> <a href='index.php?uc=nationalite&action=list' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button></div>
        </div>
      </form>
</div>"
<?php include "footer.php";?>