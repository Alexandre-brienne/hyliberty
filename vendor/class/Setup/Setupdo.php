<?php 

namespace App\Setup;
abstract class Setupdo {

    protected $DBHOST = "localhost";
    protected $DBUSER = "root";
    protected $DBPASS = "";
    protected $DBNAME = "hyliberty";
    protected $FETCH = "FETCH_ASSOC";
    protected $db = null;
    protected $CHARSET = "utf8";


    protected function connexion(){
        
  
       
        $dsn = 'mysql:dbname='.$this->DBNAME.";host=".$this->DBHOST;
        try {
        $this->db = new \PDO($dsn,$this->DBUSER,$this->DBPASS);
        $this->db->exec("SET NAMES $this->CHARSET");
        $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            //on affiche le messaage d'erreur si le new PDO échoue
            die($e->getMessage());
        
        
        }
     
      




    }

    



}



?>