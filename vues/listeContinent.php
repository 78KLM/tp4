<div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des Continent</h2></div>
            <div class="col-3"><a href='formContinent.php?action=Ajouter' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée un continent <a></div>


            </div>
        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-7">Libellé</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LesContinents as $continent) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$continent->getNum() </td>";
                    echo "<td class='col-md-5'>$continent->getLibelle()</td>";
                    echo "<td class='col-md-3'>$nationalite->libCont</td>";
                    echo "<td class='col-md-3'>
                    <a href='formNat.php?action=Modifier&num=".$continent->getNum()."' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité <a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer cette nationalité ?' data-suppr='supprNat.php?num=" .$continent->getNum()."' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité <a>
                    </td>";
                    echo "</tr>" ;
                ///supprNat.php?num=$nationalite->num
                }
                ?>
                

            </tbody>
            </table>
    </div>