<?php
session_start();


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

    $id = strip_tags($content['id']);

    $sql->lireall($id);
    
    echo json_encode(
            $sql->lireall($id)
            );


    
 }else{
    
    http_response_code(405);
    echo json_encode(["message" => "La méthode n'est pas autorisée"]);
}

?>