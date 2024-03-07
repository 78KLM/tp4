<?php 
class Continent
{
        /**
         * numéro du continent
         *
         * @var int
         */
    private $num; 

    /**
     * libelle du continent
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
     * @return Continent[] tableau d'objet continent
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("select * from continent");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->execute();
        $lesResultats=$req->fetchALL();
        return $lesResultats;
    }


    /**
     * Trouve un continent par son num
     *
     * @param integer $id numéro du continent
     * @return Continent objet continent trouvé
     */
    public static function findById(int $id) :Continent
    {
        $req=MonPdo::getInstance()->prepare("select * from continent where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'Continent');
        $req->bindParam(':id',$id);
        $req->execute();
        $esResultats=$req->fetch();
        return $esResultats;
    }


    /**
     * Permet d'ajouter un continent
     *
     * @param Continent $continent contient à ajouter
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function add(Continent $continent) :int 
    {
        $req=MonPdo::getInstance()->prepare("insert into continent(libelle) values(:libelle)");
        $req->bindParam(':libelle',$continent->getLibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier le continent
     *
     * @param Continent $continent continent à modifié
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function update(Continent $continent) :int 
    {
        $req=MonPdo::getInstance()->prepare("update continent set libelle= :libelle where num= :id");
        $req->bindParam(':id',$continent->getNum());
        $req->bindParam(':libelle',$continent->getlibelle());
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de supprimer ton contient
     *
     * @param Continent $continent continent à supprimer
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function delete(Continent $continent) :int 
    {
        $req=MonPdo::getInstance()->prepare("delete from continent where num= :id");
        $req->bindParam(':id',$continent->getNum());
        $nb=$req->execute();
        return $nb;
    }




    /**
     * Set the value of num
     */
    public function setNum($num): self
    {
        $this->num = $num;

        return $this;
    }


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