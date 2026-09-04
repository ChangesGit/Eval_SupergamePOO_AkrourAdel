<?php namespace View;

use View\View;

class ViewHome extends View {
    private ?string $message = "";
    private ?array $datas = [];

    //Getters and setters
    public function getMessage():string {
        return $this->message;
    }
    public function setMessage(string $newMessage):self {
        $this->message = $newMessage;
        return $this;
    }

    public function getDatas():array {
        return $this->datas;
    }
    public function setDatas(array $newDatas):self {
        $this->datas = $newDatas;
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

