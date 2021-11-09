<?php 
namespace App\Security;

class Security {
 

    static function protectedsql($sql) {


       htmlspecialchars(strip_tags($sql));


    }
    



}



?>