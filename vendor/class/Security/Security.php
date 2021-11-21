<?php 
namespace App\Security;

class Security {
 

    static function Antixss($sql) {

      return htmlspecialchars(strip_tags($sql),ENT_QUOTES);


    }
    
     



}



?>