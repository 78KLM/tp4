<?php 
class Nationalite
{
        /**
         * numéro de la Nationalité
         *
         * @var int
         */
    private $num; 

    /**
     * libelle de la Nationalité
     *
     * @var string
     */
    private $libelle;

    /**
     * clef etrangère du num du continent
     *
     * @return int
     */
    private $numContinent;










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
     * Renvoie l'objet Continent associé
     */
    public function getNumContinent() : Continent
    {
        return Continent::findById($this->numContinent);
    }

    /**
     * Set the value of numContinent
     */
    public function setNumContinent(Continent $continent): self
    {
        $this->numContinent = $continent->getNum();

        return $this;
    }

    






    
    /**
     * Retourne l'ensembe des continets
     *
     * @return Nationalite[] tableau d'objet Nationalite
     */
    public static function findALL(?string $libelle="", ?string $continentSel="Tous") :array
    {
        $texteReq="select n.num as numero, n.libelle as 'libNation', c.libelle as 'libContinent' from nationalite n, continent c where n.numContinent=c.num";
        if($libelle !="")
        {
            $texteReq.=" and n.libelle like '%" .$libelle. "%'";
        }

        if($continentSel !="Tous")
        {
            $texteReq.=" and c.num = " .$continentSel;
        }
        $texteReq.=" order by n.libelle";
        $req=MonPdo::getInstance()->prepare($texteReq);
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->execute();
        $lesResultats=$req->fetchALL();
        return $lesResultats;
    }


    /**
     * Trouve un nationalite par son num
     *
     * @param integer $id numéro du nationalite
     * @return Nationalite objet nationalite trouvé
     */
    public static function findById(int $id) :Nationalite
    {
        $req=MonPdo::getInstance()->prepare("select * from nationalite where num= :id");
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,'nationalite');
        $req->bindParam(':id',$id);
        $req->execute();
        $esResultats=$req->fetch();
        return $esResultats;
    }


    /**
     * Permet d'ajouter un nationalite
     *
     * @param Nationalite $nationalite contient à ajouter
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function add(Nationalite $nationalite) :int 
    {
        $numContinent = $nationalite->getNumContinent()->getNum(); // Récupérer l'ID du continent
        $req=MonPdo::getInstance()->prepare("insert into nationalite(libelle,numContinent) values(:libelle, :numContinent)");
        $req->bindParam(':libelle',$nationalite->getLibelle());
        $req->bindParam(':numContinent', $numContinent); // Utiliser l'ID du continent
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de modifier le nationalite
     *
     * @param Nationalite $nationalite nationalite à modifié
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function update(Nationalite $nationalite) :int 
    {
        $req=MonPdo::getInstance()->prepare("update nationalite set libelle= :libelle, numContinent= :numContinent where num= :id");
        $num=$nationalite->getNum();
        $req->bindParam(':id',$num);
        $req->bindParam(':libelle',$nationalite->getlibelle());
        $numContinent = $nationalite->getNumContinent()->getNum();
        $req->bindParam(':numContinent', $numContinent);
        $nb=$req->execute();
        return $nb;
    }

    /**
     * permet de supprimer ton contient
     *
     * @param nationalite $nationalite nationalite à supprimer
     * @return integer 1 si l'oppération a reussi 0 si elle a fail
     */
    public static function delete(Nationalite $nationalite) :int 
    {
        $req=MonPdo::getInstance()->prepare("delete from nationalite where num= :id");
        $num=$nationalite->getNum();
        $req->bindParam(':id',$num);
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
}


?>