<?php 
class Genre
{
        /**
         * numéro du genre
         *
         * @var int
         */
    private $num; 

    /**
     * libelle du genre
     *
     * @var string
     */
    private $libelle;













    public function getNum()
    {
    return $this->num;
    }



    /**
     * lit le libelle
     *
     * @return string
     */
    public function getLibelle() : string
    {
    return $this->libelle;
    }

    /**
     * ecrit dans le libelle
     *
     * @param string $libelle
     * @return self
     */
    public function setLibelle(string $libelle): self
    {
    $this->libelle = $libelle;

    return $this;
    }
    /**
     * Retourne l'ensembe des continets
     *
     * @return Genre[] tableau d'objet genre
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("select * from genre");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'genre');
        $req->execute();
        $lesResultats=$req->fetchALL();
        return $lesResultats;
    }


    /**
     * Trouve un genre par son num
     *
     * @param integer $id numéro du genre
     * @return Genre objet genre trouvé
     */
    public static function findById(int $id) :Genre
    {
        $req=MonPdo::getInstance()->prepare("select * from genre where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'genre');
        $req->bindParam(':id',$id);
        $req->execute();
        $esResultats=$req->fetch();
        return $esResultats;
    }


    /**
     * Permet d'ajouter un Genre
     *
     * @param Genre $Genre contient à ajouter
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function add(Genre $genre) :int 
    {
        $libelle=$genre->getlibelle();
        $req=MonPdo::getInstance()->prepare("insert into genre(libelle) values(:libelle)");
        $req->bindParam(':libelle',$libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier le Genre
     *
     * @param Genre $genre Genre à modifié
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function update(Genre $genre) :int 
    {
        $req=MonPdo::getInstance()->prepare("update genre set libelle= :libelle where num= :id");
        $num=$genre->getNum();
        $libelle=$genre->getlibelle();
        $req->bindParam(':id',$num);
        $req->bindParam(':libelle',$libelle);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de supprimer ton contient
     *
     * @param Genre $genre Genre à supprimer
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function delete(Genre $genre): int 
    {
        $num = $genre->getNum();
        $req = MonPdo::getInstance()->prepare("delete from genre where num= :id");
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