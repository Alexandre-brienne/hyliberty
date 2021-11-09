<?php
use App\Entity\Entitysql;
use App\Autoloader;

require_once 'vendor/class/Autoloader.php';
Autoloader::register();
session_start();
$auth = new Entitysql;



var_dump($_SESSION);

unset($_SESSION['ERROR']);


?>