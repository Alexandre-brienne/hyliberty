<?php 
namespace App\Param;
trait Paramsql 

{
    

     
    function __construct($test = null) 
    {   

        if ($test != null) {
         $this->DBNAME = $test;
        }
        $this->connexion();


    }




}

