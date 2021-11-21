<?php

namespace App\Entity;

use App\Setup\Setupdo;
use App\Param\Paramsql;
use App\Security\Security;
use App\Jwt\Jwt;



class Entitysql extends Setupdo
{

    use Paramsql;



    public function inscription_user($auth)
    {

        $verif = [];
        $verif['email'] = Security::Antixss($auth['email']);
        $verif['nom'] = Security::Antixss($auth['nom']);
        $verif['prenom'] = Security::Antixss($auth['prenom']);
        $verif['telephone'] = Security::Antixss($auth['telephone']);
        $verif['password'] = password_hash($auth['password'], PASSWORD_ARGON2I);






        $sql = "INSERT INTO `clients` (`id`, `email`, `nom`, `prenom`, `password`, `telephone`) VALUES (NULL, :email,:nom,:prenom,:pass,:telephone)";
        $query = $this->db->prepare($sql);


        $query->bindValue(':email', $verif['email'], \PDO::PARAM_STR);
        $query->bindValue(':nom', $verif['nom'], \PDO::PARAM_STR);
        $query->bindValue(':prenom', $verif['prenom'], \PDO::PARAM_STR);
        $query->bindValue(':pass', $verif['password'], \PDO::PARAM_STR);
        $query->bindValue(':telephone', $verif['telephone'], \PDO::PARAM_STR);

        $query->execute();

        http_response_code(400);
        echo json_encode(["message" => "ca marche"]);

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

    public function lireuser($email){
        $sql = 'SELECT * FROM `clients` WHERE email = :email';
        $query = $this->db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        return $query->fetch();

    }


    public function verifuser_password($auth)
    {   
        $user = $this->lireuser($auth['email']);
        if ($user) {
            if (password_verify($auth['password'], $user['password'])) {
                $header = [
                    "typ" => "JWT",
                    "alg" => "hs256"
                ];

                $payload = [
                    "id" => $user['id'],
                    "email" => $user['email'],
                    "password" => $user['password'],
                    "nom" => $user['nom'],
                    "prenom" => $user['prenom'],
                    "telephone" => $user['telephone']

                ];

                $jwt = new JWT();
                
                
                echo json_encode($jwt->generate($header,$payload,"taram"));


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
