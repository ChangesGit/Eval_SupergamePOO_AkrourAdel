<?php namespace View;

use View\View;

class ViewHome extends View {
    private ?string $message = "";
    private ?array $datas = [];

    //Getters and setters
    public function getMessage():string {
        return $this->message;
    }
    public function setMessage(string $message):self {
        $this->message = $message;
        return $this;
    }

    public function getDatas():array {
        return $this->datas;
    }
    public function setDatas(array $datas):self {
        $this->datas = $datas;
        return $this;
    }

    //Methods
    public function displayMain():self {
        ob_start();
?>
        <main>
            <form action="" method="POST">
                <label for="pseudo">Pseudo :<input type="text" id="pseudo" name="pseudo"></label>
                <label for="score">Score :<input type="number" id="score" name="score"></label>

                <label for="id-team">Team :&nbsp;:</label>
                <select name="id-team" id="id-team">
                    <option value="1">Aucune</option>
                    <option value="2">TeamRocket</option>
                    <option value="3">DreamTeam</option>
                </select>
                <input type="submit" name="submitPlayer" value="Enregistrer joueur">
            </form>
            <p><?= $this->message ?></p>
            <ul>

        <?php  
                // inclusion de la boucle foreach effectuer en 1. (plus haut) au sein du template HTML mis en buffer
                foreach($this->datas as $row){
?>
                    <li>Pseudo : <?= $row['pseudo'] ?> - Score : <?= $row['score'] ?> - Team : <?= $row['team'] ?></li>
<?php    
                }
?>
                </ul>
            </main>
<?php
        $this->setBuffer(ob_get_clean());
        echo $this->getBuffer();
        return $this;
    }

    public function displayAll():void {
        $this->displayHeader();
        $this->displayMain();
        $this->displayFooter();
    }
}

