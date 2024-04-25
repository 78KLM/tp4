<?php 
class Auteur
{
        /**
         * numéro de l'auteur
         *
         * @var int
         */
    private $num; 

    /**
     * nom de l'auteur
     *
     * @var string
     */
    private $nom;

        /**
     * prenom de l'auteur
     *
     * @var string
     */
    private $prenom;

    private $nationalite;


    











    public function getNum()
    {
    return $this->num;
    }



    /**
     * lit le nom
     *
     * @return string
     */
    public function getNom() : string
    {
    return $this->nom;
    }

        /**
     * lit le prenom
     *
     * @return string
     */
    public function getPrenom() 
    {
    return $this->prenom;
    }

    /**
     * ecrit dans le nom
     *
     * @param string $nom
     * @return self
     */
    public function setNom(string $nom): self
    {
    $this->nom = $nom;

    return $this;
    }

        /**
     * ecrit dans le prenom
     *
     * @param string $prenom
     * @return self
     */
    public function setPrenom(string $prenom): self
    {
    $this->prenom = $prenom;

    return $this;
    }

        /**
     * Get the number of the continent for this author.
     *
     * @return string|null The number of the continent, or null if not set.
     */
    public function getNationalite()
    {
        return $this->nationalite;
    }

    
    /**
     * Set the value of numContinent
     */
    public function setNationalite(Nationalite $nationalite) : self
    {
        $this->nationalite = $nationalite;
        return $this;
    }


    /**
     * retourne l'ensemble des auteurs
     *
     * @return array
     */
    public static function findAll(?string $prenom = "", ?string $nom = "", ?string $nationaliteSel = "Tous"): array {
        $texteReq = "SELECT a.num, a.nom, a.prenom, n.libelle AS nationalite FROM auteur a JOIN nationalite n ON a.numNationalite = n.num ";
        if($prenom !== "") {
            $texteReq .= " WHERE a.prenom LIKE '%" . $prenom . "%'";
        }
    
        if($nom !== "") {
            $texteReq .= ($prenom !== "") ? " AND a.nom LIKE '%" . $nom . "%'" : " WHERE a.nom LIKE '%" . $nom . "%'";
        }
    
        if($nationaliteSel !== "Tous") {
            $texteReq .= ($prenom !== "" || $nom !== "") ? " AND n.libelle = '" . $nationaliteSel . "'" : " WHERE n.libelle = '" . $nationaliteSel . "'";
        }
    
        $req = MonPdo::getInstance()->prepare($texteReq);
        $req->setFetchMode(PDO::FETCH_CLASS, 'Auteur');
        $req->execute();
        $lesResultats = $req->fetchAll();
        return $lesResultats;
    }


    /**
     * Trouve un auteur par son num
     *
     * @param integer $id numéro du auteur
     * @return Auteur objet auteur trouvé
     */
    public static function findById(int $id) :Auteur
    {
        $req=MonPdo::getInstance()->prepare("select * from auteur where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'auteur');
        $req->bindParam(':id',$id);
        $req->execute();
        $esResultats=$req->fetch();
        return $esResultats;
    }


    /**
     * permet d'ajouter un auteur
     *
     * @param Auteur $auteur Auteur à ajouter
     * @return integer Résultat (1 si l'opération a réussi et 0 sinon)
     */
    public static function add(Auteur $auteur) : int
    {
        $req = MonPdo::getInstance()->prepare("INSERT INTO auteur (nom, prenom, nationalite) VALUES (:nom, :prenom, :nationalite)");
        $nom = $auteur->getNom();
        $prenom = $auteur->getPrenom();
        $numContinent = $auteur->getNationalite();
        $req->bindParam(":nom", $nom);
        $req->bindParam(":prenom", $prenom);
        $req->bindParam(":nationalite", $nationalite);
        $nb = $req->execute();
        return $nb; 
    }

    /**
     * permet de modifier l'Auteur
     *
     * @param Auteur $auteur Auteur à modifié
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function update(Auteur $auteur) :int 
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set nom= :nom, prenom= :prenom where num= :id");
        $num=$auteur->getNum();
        $nom=$auteur->getNom();
        $prenom=$auteur->getPrenom();
        $req->bindParam(':id',$num);
        $req->bindParam(':nom',$nom);
        $req->bindParam(':prenom',$prenom);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de supprimer ton contient
     *
     * @param Auteur $auteur Auteur à supprimer
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function delete(Auteur $auteur): int 
    {
        $num = $auteur->getNum();
        $req = MonPdo::getInstance()->prepare("delete from auteur where num= :id");
        $req->bindParam(':id', $num);
        $nb = $req->execute();
        return $nb;
    }




    /**
     * Set the value of num
     */



    /**
     * Set the value of num
     */
    public function setNum($num): self
    {
        $this->num = $num;

        return $this;
    }
}


?>