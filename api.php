<?php
session_start();

$_SESSION["auth"] = [
    "id" => 1
];

require_once 'vendor/class/Autoloader.php';
use App\Entity\Entitysql;
use App\Autoloader;
Autoloader::register();

$sql = new Entitysql;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = strip_tags($_GET['id']);
    if ($_SESSION["auth"]["id"] == $id  ) {

    echo json_encode([

        "user" => $sql->lireun($id)

    ]);
 } else {
    http_response_code(403);
    echo json_encode(
        [
            "message" => "dessoler vous n'avez pas acces"
        
        ]
    );

 } 
 


  

    

}else{
    
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

?>