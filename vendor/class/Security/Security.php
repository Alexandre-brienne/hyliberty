<?php 
namespace App\Security;

class Security {
 

    static function protectedsql($sql) {


      return htmlspecialchars(strip_tags($sql));


    }
    



}



?>