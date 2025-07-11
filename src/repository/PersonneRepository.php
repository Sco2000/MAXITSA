<?php

namespace App\repository;

use App\core\Database;
use App\entity\Utilisateur;
use App\entity\Profil;
use App\core\Validator;
// use App\entity\Client;
use PDO;

class PersonneRepository {

    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }
    
    public function selectByLoginAndPassword(string $login, string $password): null | Utilisateur {
        try {
            $sql = "SELECT * FROM Users WHERE login = :login AND password = :password";
            $stmt =$this->pdo->prepare($sql);
            // var_dump($sql); die;
            $stmt->execute([
                ':login' => $login,
                ':password' => $password
            ]);
            
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            if ($result === false) {
                return null; 
            }
            // var_dump($result); die;
            $utilisateur = new Utilisateur();
            $newUser = $utilisateur->toObject($result);
            // var_dump($newUser); die;
            return $newUser;
            // if ($result['type'] === 'Vendeur') {
            //     $personne = new Vendeur();
            //     return $personne->toObject($result);
            // }else{
            //     $personne = new Client();
            //     // var_dump($personne->toObject($result)); die;
            //     return $personne->toObject($result);
            // }
            
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération de la personne: " . $th->getMessage());
        }
    }

    public function selectPersonneById(int $id): null | Vendeur | Client {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM Personne WHERE id = :id");
            $stmt->execute([
                ':id' => $id
            ]);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            // var_dump($result); die;
            if ($result === false) {
                return null;
            }
            if ($result['type'] === 'Vendeur') {
                
                return $personne = Vendeur::toObject($result);
            }else{
                
                // var_dump($personne->toObject($result)); die;
                return $personne = Client::toObject($result);
            }

        }
    catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération de la personne: " . $th->getMessage());
        }
    }

    public function insert(string $nom, string $login, string $password, int $idProfil, string $numerocarteIdentite, string $photo): int {
        try {
            $sql = "INSERT INTO users (nom, login, password, numerocarteIdentite, photo, typeuser_id) VALUES (:nom, :login, :password, :numerocarteIdentite, :photo, :typeuser_id)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':nom' => $nom,
                ':login' => $login,
                ':password' => $password,
                ':typeuser_id' => $idProfil,
                ':numerocarteIdentite' => $numerocarteIdentite,
                ':photo' => $photo
            ]);
            return $this->pdo->lastInsertId();
        } catch (\Throwable $th) {

            throw new \Exception("Erreur lors de l'insertion de la personne: " . $th->getMessage());
        }

    }

    // public function selectLogin(){
    //     try {
    //         $sql = "SELECT login FROM users";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute();
    //         $datas = [];
    //         while ($row = $cursor->fetch(\PDO::FETCH_ASSOC)){
    //             $datas[] = $row['login'];
    //         }
           
    //         return $logins;
    //     } catch (\Throwable $th) {
    //         throw new \Exception("Erreur lors de la récupération des logins: " . $th->getMessage());
    //     }
    // }
}