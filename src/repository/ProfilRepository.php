<?php

namespace App\repository;
use App\core\Database;
use App\entity\Profil;
use PDO;

class ProfilRepository {
    private PDO $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance();
    }

    public function getIdProfil(string $nomProfil): int {
        try {
            $sql = "SELECT id FROM typeuser WHERE nomprofil = :nomprofil";
            $stmt = $this->pdo->prepare($sql);
            // var_dump($nomProfil); die;
            $stmt->execute([':nomprofil' => $nomProfil]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result === false) {
                return 0;
            }
            return $result['id'];
        }
        catch (\Throwable $th) {
            throw new \Exception("Erreur lors de la récupération de l'id du profil: " . $th->getMessage());
        }
    }
}