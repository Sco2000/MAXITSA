<?php
namespace App\core\abstract;

class AbstractRepository {
    protected static PDO $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
}