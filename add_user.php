<?php 
session_start();

if (!empty($_POST) AND isset($_POST) ) {
    



    if (isset($_POST['email']) AND empty($_POST['email']) AND !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) AND strlen($_POST['email'] > 255 ) ) {
        
        $_SESSION['ERROR']= "email invalid";
        
    
    }


    if (isset($_POST['pass']) AND empty($_POST['pass'])) {
        $_SESSION['ERROR']['password'] = "merci d'ecrire votre mot de passe";
        header("Location: auth.php");
    
    } else if ($_POST['pass'] !== $_POST['pass2']) {
        $_SESSION['ERROR']['password'] = "le mot de passe n'est pas identique";

    } else if (isset($_POST['pass']) AND empty($_POST['pass']) AND !preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$_POST['pass'])) {
        $_SESSION['ERROR']['passwordforce'] = " erreur votre mot de passe doit contenir : 1 chiffre,1 Majuscule,1 Minuscule, et un longeur minimun de 8 caractères";
       


    if (isset($_SESSION['ERROR']) ){

        header("Location: auth.php");}
    }
      

} else {

    var_dump($_POST);

    header("Location: auth.php");

    
}
 

?>