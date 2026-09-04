<?php namespace Controller;

use Controller\Controller;

class ControllerHome extends Controller {
    public function displayPlayers():self {
        $datas = $this->getModel()->findAll();
        $this->getView()->setDatas($datas);
        return $this;
    }

    public function registerPlayers():self {
        //Vérifier si je reçoit le formulaire d'inscription
        if(isset($_POST['submitPlayer'])){
            //Vérifier les champs vides

            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $idTeam = sanitize($_POST['id-team']);

            if($pseudo || $score || $idTeam){
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return $this;
            }
            

            //Nettoyer les données
            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $idTeam = sanitize($_POST['id-team']);
            

            //Je vais fournir au modèle ces données
            $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($idTeam);

            
            //Vérifier si le pseudo est libre
            $data = $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return $this;
            }

            //Lancement de l'insertion en BDD
            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
            return $this;
        }
        return $this;
    }
}
