<?php 
namespace App\Form;


class Form {
    private $form = [];

    function __construct($preform = [
        "label" => "",
        "type" => "",
        "div" => "",
        "name" => "",
        "classinput" => ""

    ]) {
        
        $statue = match($preform['type']) {
            "password" => 1,
            "email" => 1,
            "text" => 1,
            "textarea"=>2,
            default => throw new \Exception("type invalid", 1)
        };

        $this->form = [
            "label" => $preform['label'],
            "type" => $preform['type'],
            "div" => $preform['div'],
            "name" => $preform['name'],
            "classinput" => $preform['classinput'],
            "statue" => $statue


        ];

      
    }

    public function test() {

 

        if ($this->form['statue'] === 1) {  

            

        ?>    
        
            <div <?= $this->form['div'] ?? `class= "$this->form['div']"`    ?? ""    ?> >
                <label for="<?= $this->form['label']?>"> <?= $this->form['name']?> </label>
                <input  <?= $this->form['classinput'] ?? `class= "$this->form['div']"`    ?? ""    ?>  type="<?= $this->form['type']?>" name="prenom" id="prenom">
             </div>
            <?php    

        }


    }

}


?>