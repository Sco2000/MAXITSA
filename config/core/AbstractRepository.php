<?php
namespace App\core;

class AbstractRepository {
    protected static PDO $pdo;
    public function __construct() {
        $this->pdo = Database::getInstance();
    }
}