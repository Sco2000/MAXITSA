<?php

namespace App\repository;

class ProduitRepository {
    public function selectAllProduits(): array {
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            $pdo = new PDO($dsn, 'root', 'ousman00');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM produits");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération des produits: " . $th->getMessage());
        }
    }

    public function selectProduitById(int $id): ?array {
        $dsn = "mysql:host=localhost;dbname=gestion_commercial;charset=utf8mb4";
        try {
            $pdo = new \PDO($dsn, 'root', 'ousman00');
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id");
            $stmt->execute([':id' => $id]);
            $stmt->fetch(\PDO::FETCH_ASSOC);
            return $produit->toObject($stmt->fetch(\PDO::FETCH_ASSOC));
        } catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération du produit: " . $th->getMessage());
        }
    } 
}