<?php namespace Model;

use PDO;

class Model {
    //ATTRIBUT
    private PDO $bdd;

    //CONSTRUCTOR
    public function __construct(PDO $bdd){
        $this->bdd = $bdd;
    }

    //GETTER ET SETTER
    public function getBDD():PDO{
        return $this->bdd;
    }

    public function setBDD(PDO $bdd):self{
        $this->bdd = $bdd;
        return $this;
    }
}