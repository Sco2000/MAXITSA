<?php

namespace App\repository;

class CommandeProduitRepository {
    public function selectAllCommandeProduits(): array {
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', 'ousman00');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->query("SELECT * FROM commande_produits");
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération des commandes: " . $th->getMessage());
        }
    }

    public function getId(): int {
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', 'ousman00');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->query("SELECT id FROM commande_produits ORDER BY id DESC LIMIT 1");
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result['id'];
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération de l'id: " . $th->getMessage());
        }
    }
    
    public function insertCommandeProduit(CommandeProduit $commandeProduit, int $id): bool {
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', 'ousman00');
            $commandeId = $id;
            $produitId = $commandeProduit->getProduit()->getId();;
            $quantiteCommandee = $commandeProduit->getQuantiteCommandee();
            $prixUnitaire = $commandeProduit->getPrixUnitaire();

            $sql = "INSERT INTO commande_produits (commande_id, produit_id, quantite_commandee, prix_unitaire) VALUES (:commande_id, :produit_id, :quantite_commandee, :prix_unitaire)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':commande_id' => $commandeId,
                ':produit_id' => $produitId,
                ':quantite_commandee' => $quantiteCommandee,
                ':prix_unitaire' => $prixUnitaire
            ]);
            return true;
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de l'insertion de la commande produit: " . $th->getMessage());
        }
    }
} 
  