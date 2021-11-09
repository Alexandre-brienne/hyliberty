<?php
require_once 'vendor/class/Autoloader.php';
use App\Entity\Entitysql;
use App\Security\Security;
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

    if (isset($content) AND !empty($content)) {
        
        if (isset($content["email"]) AND empty($content["email"]) AND !filter_var($content["email"], FILTER_VALIDATE_EMAIL)) {
            
            $erreur['email'] = "dessoler l'email n'est pas valide";
        }else{
            $valid['email'] = Security::protectedsql($content['email']);
        }

        if (isset($content["password"]) AND empty($content["password"])) {
            
            $erreur['password'] = "dessoler le mot de passe est vide";
        }else{
            $valid['password'] = Security::protectedsql($content['password']);
        }
        
        if (isset($erreur) AND !empty($erreur)) {
            http_response_code(405);
            echo json_encode(
            [
                "code"=>0,
                "message" => $erreur
                
            ]
        );


        }else{

            $sql->verifuser_password($valid);


        }


    }else{
        http_response_code(405);
        echo json_encode(
            [
                "code"=>0,
                "message" => "merci d'entrée votre adresse email"
                
                ]
        );
    }




}else{

    http_response_code(405);
    echo json_encode(["message" => "La methode nest pas autorisee"]);

}





?>