<div class="container mt-5">
        <div class="row pt-3"> 
            <div class="col-9"><h2>Liste des Auteur</h2></div>
            <div class="col-3"><a href='index.php?uc=auteur&action=add' class='btn btn-success'><i class='fa-solid fa-plus'></i>Crée un auteur </a></div>


            </div>
        <table class="table table-hover table-striped table-dark">
        <thead>
                <tr class='d-flex'>
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-2">Nom</th>
                <th scope="col" class="col-md-2">Prénom</th>
                <th scope="col" class="col-md-3">nationalité</th>
                <th scope="col" class="col-md-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($LesAuteurs as $auteur) {
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>".$auteur->getNum().  "</td>";
                    echo "<td class='col-md-2'>" .$auteur->getNom(). "</td>";
                    echo "<td class='col-md-2'>" .$auteur->getPrenom(). "</td>";
                    echo "<td class='col-md-3'>" .$auteur->getNationalite(). "</td>";
                    echo "<td class='col-md-3'>
                    <a href='index.php?uc=auteur&action=update&num=".$auteur->getNum()."' class='btn btn-primary'><i class='fa-solid fa-pen'></i>Modifier la nationalité </a>
                    <a href='#supprNat' data-toggle='modal' data-msg='Voulez vous vraiment supprimer cette nationalité ?' data-suppr='index.php?uc=auteur&action=delete&num=" .$auteur->getNum()."' class='btn btn-danger'><i class='fa-solid fa-trash'></i>Supprimer la nationalité </a>
                    </td>";
                    echo "</tr>" ;
                ///supprNat.php?num=$nationalite->num
                }
                ?>
                

            </tbody>
            </table>
    </div>