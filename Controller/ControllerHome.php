<?php namespace Controller;

use Controller\Controller;

class ControllerHome extends Controller {
    public function displayPlayers():self {
        $datas = $this->getModel()->findAll();
        $this->getView()->setDatas($datas);
        return $this;
    }

    public function registerPlayers():self {
        if(isset($_POST['submitPlayer'])){
            //On sanitize/trim avant pour éviter qu'un champs avec uniquement des espaces passe la vérification

            $pseudo = sanitize($_POST['pseudo']);
            $score = sanitize($_POST['score']);
            $idTeam = sanitize($_POST['id-team']);

            //On vérifie si un des champs est vide
            if(empty($pseudo) || empty($score) || empty($idTeam)){
                $this->getView()->setMessage('Veuillez remplir tous les champs.');
                return $this;
            }
            

            //On donne les données au modèle
            $this->getModel()->setPseudo($pseudo)->setScore($score)->setIdTeam($idTeam);

            
            //Vérifier si le pseudo est libre
            $data = $this->getModel()->findByPseudo();
            if($data){
                $this->getView()->setMessage("Ce pseudo n'est pas disponible.");
                return $this;
            }

            
            $this->getModel()->add();

            $this->getView()->setMessage("Vous avez bien été enregistré.");
            return $this;
        }
        return $this;
    }
}
