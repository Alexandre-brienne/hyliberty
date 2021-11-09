<?php

use App\Autoloader;
use App\Entity\Entitysql;
require_once 'vendor/class/Autoloader.php';
Autoloader::register();

$sql = new Entitysql;


session_start();

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="add_user.php" method="post">
      
        <div>
            <label for="email"> adresse email </label>
            <input type="email" name="email" id="email">
        </div>
        <div>
            <label for="prenom"> prenom </label>
            <input type="text" name="prenom" id="prenom">
        </div>
        <div>
            <label for="nom">nom </label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="pass">mot de passe </label>
            <input type="password" name="pass" id="pass">
        </div>
        <div>
            <label for="pass2">confirmations du mot de passe </label>
            <input type="password" name="pass2" id="pass2">
        </div>
        <button type="submit">inscription</button>
    </form>
</body>

</html>