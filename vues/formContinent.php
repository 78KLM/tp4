


<div class='container mt-5'>
    <h2 class='pt-3 text-center'> <?php echo $action?> un continent</h2>
      <form action='index.php?uc=continent?action=valideForm' method='post' class='col-6 offset-3 border border-secondary p-3 rounded'>
        <div class='form-group'>
            <label for='libelle'>Libellé</label>
            <input type='text' name='libelle' id='libelle' class='form-controle' placehoder='Saisir le libellé' value=<?php if($mode == "Modifier"){echo $continent->getlibelle();}?>>
        </div>



        <input type='hidden' id='num' name='num' value=<?php if($mode == "Modifier"){ echo $continent->getNum();}?>>
        <div class='row'>
            <div class='col'> <a href='index.php?uc=continent&action=list' class='btn btn-warning btn-block'> revenir à la liste</a></div>
            <div class='col'> <button type='submit' class='btn btn-success btn-block'> <?php echo $mode ?> </button></div>
        </div>
      </form>
</div>"
<?php include "footer.php";?>