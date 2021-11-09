<?php

session_start();
use App\Autoloader;
use App\Security\Security;
use App\entity\Entitysql;
require_once 'vendor/class/Autoloader.php';
Autoloader::register();
$sql = new Entitysql;



if (!empty($_POST) and isset($_POST)) {

    $error =  false;


    if (isset($_POST['email']) and empty($_POST['email']) and !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

        $_SESSION['ERROR']['email'] = "email invalid";
        $error = true;
    }



    if (isset($_POST['pass']) and empty($_POST['pass'])) {
        $error = true;
        $_SESSION['ERROR']['password'] = "merci d'ecrire votre mot de passe";
    } else if ($_POST['pass'] !== $_POST['pass2']) {
        $error = true;
        $_SESSION['ERROR']['password'] = "le mot de passe n'est pas identique";
    } else if (isset($_POST['pass']) and empty($_POST['pass']) and !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $_POST['pass'])) {
        $_SESSION['ERROR']['passwordforce'] = " erreur votre mot de passe doit contenir : 1 chiffre,1 Majuscule,1 Minuscule, et un longeur minimun de 8 caractères";
        $error = true;
    }
    
    if (isset($_POST['prenom']) AND empty($_POST['prenom'])) {
        $error = true;
        $_SESSION['ERROR']['prenom'] = "merci d'ecrire votre prenom";
    }

    if (isset($_POST['nom']) AND empty($_POST['nom'])) {
        $error = true;
        $_SESSION['ERROR']['nom'] = "merci d'ecrire votre nom";
    }
// $email = Security::protectedsql($_POST['email']);
//     if ($sql->verifemail()) {
//         # code...
//     }

    
    
    if ($error == true) {
            echo "bonjour ff";
            var_dump($_SESSION);
            header("Location: auth.php");
        }else{
           

            

            $auth = [
                "password" =>password_hash($_POST['pass'],PASSWORD_ARGON2ID),
                "email" => Security::protectedsql($_POST['email']),
                "nom" =>  Security::protectedsql($_POST['nom']),
                'prenom'=> Security::protectedsql($_POST['prenom']),
            ];

            $sql->inscription_user($auth);


            

        }
} else {

    var_dump($_POST);

    // header("Location: auth.php");


}

