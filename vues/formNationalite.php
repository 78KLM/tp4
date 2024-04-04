


<div class='container mt-5'>
    <h2 class='pt-3 text-center'> <?php echo $mode?> une nationalite</h2>
      <form action='index.php?uc=nationalite&action=valideForm <?php $mode ?>' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='libelle'>Libellé</label>
            <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value='<?php if($mode == "Modifier"){echo $nationalite->getlibelle();}?>'>
        </div>

        <div class='form-group'>
            <label for='continent'>Libellé du continent</label>
            <select name="continent" class='form-controle'> 
              <?php $LesContinents = [];
              foreach($LesContinents as $continent){
                $selection=$continent->getNum() == $LaNationalite->getNumContinent() ? 'selected' : '';
                echo "<option value='".$continent->getNum()."' $selection >".$continent->getLibelle()."</option>";
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