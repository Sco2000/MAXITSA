<?php

namespace App\core;

use PDO;
use PDOException;

class Database
{
    private ?PDO $pdo = null;
    private static ?Database $instance = null;

    private function __construct()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASS'];
        $driver = $_ENV['DB_DRIVER'];

        $dns = "$driver:host=$host; dbname=$dbname;port=$port";


        try {
            $this->pdo = new PDO($dns,  $user, $password); 
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connexion réussie à la base de données.\n";
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        if (self::$instance->pdo === null) {
            throw new \RuntimeException("La connexion PDO a échoué.");
        }

        return self::$instance->pdo;
    }


    public static function disconnect(): void
    {
        self::$instance = null;
    }
}