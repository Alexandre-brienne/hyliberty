<?php 
namespace App\Entity;
use App\Setup\Setupdo;
use App\Param\Paramsql;
use App\Security\Security;



class Entitysql extends Setupdo{

    use Paramsql;
    
 

    public function inscription_user($auth){

        $sql = "INSERT INTO `clients` (`email`,`nom`,`prenom`,`password`) VALUES (:email,:nom,:prenom,:password)";
        $query = $this->db->prepare($sql);

        $query->bindValue(':email',$auth['email'],\PDO::PARAM_STR);
        $query->bindValue(':nom',$auth['nom'],\PDO::PARAM_STR);
        $query->bindValue(':prenom',$auth['prenom'],\PDO::PARAM_STR);
        $query->bindValue(':password',$auth['password'],\PDO::PARAM_STR);

        $query->execute();
        
        



    }



    // public function Lire(){
      
    //     $sql = "SELECT * FROM articles";
    //     $query = $this->db->prepare($sql);
   

    //     $query->execute();
    //     return $query->fetchAll();


    // }

    // public function Lire2($id = 1){
    
        
    //     $this->db->beginTransaction();
  
    //     try{
    //     $sql = "SELECT * FROM articles WHERE id = $id";
    //     $query = $this->db->prepare($sql);
    //     $query->execute(); 
    //     $this->db->commit();
    //     }catch(\Exception $e){
    //     $this->db->rollback();
    //     echo "Failed: " . $e->getMessage();
    //     }
     

  
    //     return $query;
    // }


    
}



?>