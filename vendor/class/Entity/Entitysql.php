<?php

namespace App\Entity;

use App\Setup\Setupdo;
use App\Param\Paramsql;
use App\Security\Security;



class Entitysql extends Setupdo
{

    use Paramsql;



    public function inscription_user($auth)
    {

        $verif = [];
        $verif['email'] = Security::protectedsql($auth['email']);
        $verif['nom'] = Security::protectedsql($auth['nom']);
        $verif['prenom'] = Security::protectedsql($auth['prenom']);
        $verif['telephone'] = Security::protectedsql($auth['telephone']);
        $verif['password'] = password_hash($auth['password'], PASSWORD_ARGON2I);
        var_dump($verif);





        $sql = "INSERT INTO `clients` (`id`, `email`, `nom`, `prenom`, `password`, `telephone`) VALUES (NULL, :email,:nom,:prenom,:pass,:telephone)";
        $query = $this->db->prepare($sql);


        $query->bindValue(':email', $verif['email'], \PDO::PARAM_STR);
        $query->bindValue(':nom', $verif['nom'], \PDO::PARAM_STR);
        $query->bindValue(':prenom', $verif['prenom'], \PDO::PARAM_STR);
        $query->bindValue(':pass', $verif['password'], \PDO::PARAM_STR);
        $query->bindValue(':telephone', $verif['telephone'], \PDO::PARAM_STR);

        $query->execute();

        var_dump($query);
    }




    public function lireall()
    {
        $sql = "SELECT * FROM `clients` INNER JOIN bateaux ON clients.id = bateaux.client_id";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function verifemail($email)
    {
        $sql = 'SELECT * FROM `clients` WHERE email = :email';
        $query = $this->db->prepare($sql);
        $query->bindParam(':id', $email, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch();
    }


    public function verifuser_password($auth)
    {
        var_dump($auth);
        $sql = 'SELECT * FROM `clients` WHERE email = :email';
        $query = $this->db->prepare($sql);
        $query->bindParam(':email', $auth['email']);
        $query->execute();
        $user = $query->fetch();
        if ($user) {
            if (password_verify($auth['password'], $user['password'])) {
                http_response_code(405);
                echo json_encode(["message" => "ca marche"]);
            } else {
                http_response_code(405);
                echo json_encode(["message" => "l'email n'existe pas ou mot de passe invalid"]);
            }

        } else {

            http_response_code(405);
            echo json_encode(["message" => "l'email n'existe pas ou mot de passe invalid"]);
        }
    }
}
