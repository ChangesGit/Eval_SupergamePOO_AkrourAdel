<?php
namespace View;
    

//Pour respecter les règles de l'exercice je n'ai pas créé de ViewHeader et de ViewFooter mais en temps normal c'est ce que j'aurais fait
class View {
    //ATTRIBUTS
    private ?string $title = "";
    private ?string $buffer = "";
    private ?string $linkScript = "";
    //CONSTRUCTOR
    public function __construct(?string $title = "Mon Site", ?string $linkScript = "") {
        $this->title = $title;
        $this->linkScript = $linkScript;
    }

    //GETTER et SETTER
   public function getTitle():string {
    return $this->title;
   }
   public function setTitle(string $title):self {
    $this->title = $title;
    return $this;
   }
   public function getBuffer():string {
    return $this->buffer;
   }
   public function setBuffer(string $buffer):self {
    $this->buffer = $buffer;
    return $this;
   }
   public function getLinkScript():string {
    return $this->linkScript;
   }
   public function setLinkScript(string $linkScript):self {
    $this->linkScript = $linkScript; 
    return $this;
   }
   

    //METHODS
    
    public function displayHeader():self{
        ob_start();
?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $this->title ?></title>
            <script src="<?= $this->linkScript ?>" defer></script>
        </head>
        <body>
            <header>

            </header>
<?php
        $this->buffer = ob_get_clean();
        echo $this->buffer;
        return $this;
    }

    public function displayFooter():self{
        ob_start();
?>
                <footer>

                </footer>
            </body>
        </html>
<?php
        $this->buffer = ob_get_clean();
        echo $this->buffer;
        return $this;
    }
    
}
