<?php

declare(strict_types=1);

class Database
{
    private static ?PDO $instance = null;

    private function __construct() {}

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $host   = $_ENV['DB_HOST']     ?? 'localhost';
            $dbname = $_ENV['DB_NAME']     ?? 'pharmafefo';
            $user   = $_ENV['DB_USER']     ?? 'root';
            $pass   = $_ENV['DB_PASSWORD'] ?? '';

            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

            self::$instance = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }

        return self::$instance;
    }
}


try {
    $pdo = Database::getConnection();

    echo "Connexion est valide merci sahbi !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}




