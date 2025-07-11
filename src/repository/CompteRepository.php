<?php

namespace App\repository;
use App\core\Database;
use App\entity\Compte;
use App\entity\Client;
use App\entity\TypeEnum;
use PDO;

class CompteRepository{
    private CommandeProduitRepository $commandeProduitRepository;
    private PersonneRepository $personneRepository;
    private PDO $pdo;


    public function __construct() {

        $this->pdo = Database::getInstance();
        $this->commandeProduitRepository = new CommandeProduitRepository();
        $this->personneRepository = new PersonneRepository();
    }

    public function selectAllCommandes(): null | array {
        $dsn = "mysql:host=localhost;dbname=gestion_auchan;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', 'ousmane00');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT c.*, p.* FROM Commande c JOIN Personne p on c.client_id = p.id";
            $cursor = $pdo->query($sql);
            $datas = [];
            while ($row = $cursor->fetch(\PDO::FETCH_ASSOC)) {
                // $clientTab = [$clientTab['id']=$row['clientId'], $row['nom'], $row['type'], $row['login'], $row['password']];
                
                // var_dump($row); die;
                // $client = Client::toObject($clientTab);
                $commande = Commande::toObject($row);
                // var_dump($commande);
                $client = $this->personneRepository->selectPersonneById($row['client_id']);
                $commande->setClient($client);
                $datas[] =  $commande;
            } 
            // die;
            $commandes['commandes'] = $datas;
            // var_dump($commandes); die;
            return $commandes;
    }
    catch (\Throwable $th) {
        throw new \Exception("Erreur lors de la récupération des commandes: " . $th->getMessage());
    }
    }
    // public function insertCommande(Commande $commande): bool {
    //     $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
    //     try {
    //         $pdo = new PDO($dsn, 'root', 'ousman00');
    //         $numero = $commande->getNumero();
    //         $date = $commande->getDate();
    //         $montant = $commande->getMontant();
    //         $client = $commande->getClient()->getId();
    //         $vendeur = $commande->getVendeur()->getId();
    //         $facture = $commande->getFacture()->getId();
    //         $commandeProduits = $commande->getCommandeProduits();

    //         $pdo->beginTransaction();
    //         $sql1 = "INSERT INTO commandes (numero, date, montant, client_id, vendeur_id, facture_id) VALUES (:numero, :date, :montant, :client_id, :vendeur_id, :facture_id)";
    //         $stmt = $pdo->prepare($sql1);
    //         $stmt->execute([
    //             ':numero' => $numero,
    //             ':date' => $date,
    //             ':montant' => $montant,
    //             ':client_id' => $client,
    //             ':vendeur_id' => $vendeur,
    //             ':facture_id' => $facture
    //         ]);

    //         $commandeId = $pdo->lastInsertId();
    //         array_map(function($produit) use ($commandeId) {
    //             $commandeProduit= new CommandeProduitRepository();
    //             $commandeProduit->insertCommandeProduit($produit, $commandeId);
    //         }, $commandeProduits);

    //         $pdo->commit();
    //     } catch (\Throwable $th) {
    //         $pdo->rollback();
    //         throw new \Exception("Erreur lors de l'insertion de la commande: " . $th->getMessage());
    //     }
    // }

    public function selectCommandeByOwner($id): null | Compte{
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            // var_dump($id); die;
            $stmt = $this->pdo->prepare("SELECT * FROM compte WHERE  user_id = :id and typeenum = 'Principale'");
            $stmt->execute([':id' => $id]);
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            // var_dump($result['id']); die;
            $compte= Compte::toObject($result);
            $compte->setId($result['id']);
            // var_dump($compte); die;

            
            return $compte;
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération des commandes: " . $th->getMessage());
        }
    }

    public function insert(int $id,string $telephoone, TypeEnum $type): bool{
        try {
            $sql = "INSERT INTO compte (user_id, numero, typeenum) VALUES (:user_id, :numero, :type)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                ':user_id' => $id,
                ':numero' => $telephoone,
                ':type' => $type->value
            ]);
            return true;
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de l'insertion de la commande: " . $th->getMessage());
        }
    }
}
