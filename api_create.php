<?php
require_once 'vendor/class/Autoloader.php';
use App\Entity\Entitysql;
use App\Autoloader;
Autoloader::register();

$sql = new Entitysql;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $content = trim(file_get_contents('php://input'));
    $content = json_decode($content, true);
    
    if(isset($content) AND !empty($content)){   
   
        if (isset($content['email']) AND empty($content['email'])) {
         
            $erreur['email'] = "erreur champ de email manquant";
        }else if(!filter_var($content['email'],FILTER_VALIDATE_EMAIL)){
            $erreur['email'] = "email invalid";
        };

        if (isset($content['prenom']) AND empty($content['prenom'])) {
        
            $erreur['prenom'] = "erreur champ prenom manquant";
        };

        if (isset($content['nom']) AND empty($content['nom'])) {
        
            $erreur['nom'] = "erreur champ prenom manquant";
        };
        
        if (isset($content['telephone']) AND empty($content['telephone'])) {
        
            $erreur['telephone'] = "erreur champ telephone manquant";
        };

        if (isset($content['password']) AND empty($content['password'] OR $content['password2']) AND empty($content['password2']  )) {
        
            $erreur['password'] = "erreur champ password manquant";
        }else if($content['password'] != $content['password2']){

            $erreur['password'] = "mot de passe pas identique";

        };
        
        if (isset($erreur)) {
           
            http_response_code(404);
            echo json_encode(["message" => $erreur]);

        }else{
            $sql->inscription_user($content); 

            
        }
        



       
    }else{
        http_response_code(405);
        echo json_encode(["message" => "champ formulaire vide"]);

    }



    

    
 


    
 }else{
    
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

?>