<?php namespace Model;

use Model\Model;
use PDO;
use Exception;

class ModelPlayer extends Model {
    //Attributs
    private ?int $id;
    private ?string $pseudo;
    private ?int $score;
    private ?string $team;
    private ?int $idTeam;

    //Getters and Setters
    public function getId():int {
        return $this->id;
    }
    public function setId(int $newId):self {
        $this->id = $newId;
        return $this;
    }
    public function getPseudo():string {
        return $this->pseudo;
    }
    public function setPseudo(string $newPseudo):self {
        $this->pseudo = $newPseudo;
        return $this;
    }
    public function getScore():int {
        return $this->score;
    }
    public function setScore(int $newScore):self {
        $this->score = $newScore;
        return $this;
    }
    public function getTeam():string {
        return $this->team;
    }
    public function setTeam(string $newTeam):self {
        $this->team = $newTeam;
        return $this;
    }
    public function getIdTeam():int {
        return $this->idTeam;
    }
    public function setIdTeam(int $newIdTeam):self {
        $this->idTeam = $newIdTeam;
        return $this;
    }

    //Methods
    public function findAll():array {
        try{
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, t.team FROM player p INNER JOIN team t ON p.id_team = t.id_team');

            $req->execute();

            return $req->fetchAll(PDO::FETCH_ASSOC);
        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function findByPseudo():array | bool {
        try{
            $req = $this->getBDD()->prepare('SELECT p.id_player, p.pseudo, p.score, p.id_team FROM player p WHERE p.pseudo = ?');

            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->execute();

            return $req->fetch(PDO::FETCH_ASSOC);

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }

    public function add():void {
        try{
            $req = $this->getBDD()->prepare('INSERT INTO player (pseudo, score, id_team) VALUE(?, ?, ?)');

            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
    public function delete():void {
        try{
            $req = $this->getBDD()->prepare('DELETE FROM player WHERE id_player = ?');

            $req->bindParam(1,$this->id,PDO::PARAM_INT);
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }
    public function update():void {
        try{
            $req = $this->getBDD()->prepare('UPDATE player SET pseudo = ?, score = ?, id_team = ? WHERE id_player = ?');

            $req->bindParam(1,$this->pseudo,PDO::PARAM_STR);
            $req->bindParam(2,$this->score,PDO::PARAM_INT);
            $req->bindParam(3,$this->idTeam,PDO::PARAM_INT);
            $req->bindParam(4,$this->id,PDO::PARAM_INT);
            $req->execute();

        }catch(EXCEPTION $error){
            die($error->getMessage());
        }
    }


}