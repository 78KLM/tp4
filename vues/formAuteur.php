


<div class='container mt-5'>
    <h2 class='pt-3 text-center'> <?php echo $mode?> un auteur</h2>
      <form action='index.php?uc=auteur&action=valideForm <?php $mode ?>' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='nom'>nom</label>
            <input type='text' name='nom' id='nom' class='form-controle' placehoder='Saisir le nom' value='<?php if($mode == "Modifier"){echo $auteur->getNom();}?>'>
              
            <!-- marche pas !-->
            
            <!-- marche pas !-->
        </div>

        <div class='form-group'>
            <label for='prenom'>prénom</label>
            <input type='text' name='prenom' id='prenom' class='form-controle' placehoder='Saisir le prénom' value='<?php if($mode == "Modifier"){echo $auteur->getPrenom();}?>'>
              
            <!-- marche pas !-->
            
            <!-- marche pas !-->
        </div>

        <div class='form-group'>
          <label for='nationalite'>Libellé des nationalité</label>
          <select name="nationalite" class='form-control'>
              <?php 
              //$LesContinents=Continent::findAll();
              foreach($LesNationalites as $nationalite) {
                  $selected = ($nationalite->getNum() == $selectedNationaliteId) ? 'selected' : '';
                  echo "<option value='".$nationalite->getNum()."' $selected>".$nationalite->getLibelle()."</option>";
              }
              ?>
          </select> 
      </div>



        <input type='hidden' id='num' name='num' value=<?php if($mode == "Modifier"){ echo $auteur->getNum();}?>>
        <div class='row'>
            <div class='col'> <a href='index.php?uc=auteur&action=list' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button></div>
        </div>
      </form>
</div>"
<?php include "footer.php";?>