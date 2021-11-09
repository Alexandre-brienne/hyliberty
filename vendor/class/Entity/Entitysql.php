<?php 
namespace App\Entity;
use App\Setup\Setupdo;
use App\Param\Paramsql;
use App\Security\Security;



class Entitysql extends Setupdo{

    use Paramsql;
    
 

    public function inscription_user($auth){
        $email = $auth['email'];
        var_dump($auth);
        $sql = "INSERT INTO `clients` (`id`, `email`, `nom`, `prenom`, `password`) VALUES (NULL,:email,:nom,:prenom,:password)";
        $query = $this->db->prepare($sql);

        $query->bindValue(':email',$email,\PDO::PARAM_STR);
        $query->bindValue(':nom',$auth['nom'],\PDO::PARAM_STR);
        $query->bindValue(':prenom',$auth['prenom'],\PDO::PARAM_STR);
        $query->bindValue(':password',$auth['password'],\PDO::PARAM_STR);

        $query->execute();
        
        header('Location: admin/index.php');



    }



    
    public function lireall(){
        $sql = "SELECT * FROM `clients` INNER JOIN bateaux ON clients.id = bateaux.client_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();




    }

    public function verifemail($email){
        $sql = 'SELECT * FROM `clients` WHERE email = :email';
        $query = $this->db->prepare($sql);
        $query->bindParam(':id',$email,\PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();

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