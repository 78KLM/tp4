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
     * Retourne l'ensembe des continets
     *
     * @return Auteur[] tableau d'objet auteur
     */
    public static function findAll() :array
    {
        $req=MonPdo::getInstance()->prepare("select * from auteur");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'auteur');
        $req->execute();
        $lesResultats=$req->fetchALL();
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
     * Permet d'ajouter un Auteur
     *
     * @param Auteur $auteur contient à ajouter
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function add(Auteur $auteur) :int 
    {
        $nom=$auteur->getNom();
        $prenom=$auteur->getPrenom();
        $req=MonPdo::getInstance()->prepare("insert into auteur(nom,prenom) values(:nom, :prenom)");
        $req->bindParam(':nom',$nom);
        $req->bindParam(':prenom',$prenom);
        $nb=$req->execute();
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