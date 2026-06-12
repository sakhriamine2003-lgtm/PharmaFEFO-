<?php

declare(strict_types=1);

require_once __DIR__ . '/../Model/Utilisateur.php';

class UserRepository
{
    public function __construct(private PDO $pdo) {}

    public function findByEmail(string $email): ?Utilisateur
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM UTILISATEUR WHERE email = ? LIMIT 1'
        );
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if (!$row) return null;

        return new Utilisateur(
            $row['id'],
            $row['nom'],
            $row['email'],
            $row['mot_de_passe'],
            $row['role'],
            (bool) $row['actif']
        );
    }

    public function findById(string $id): ?Utilisateur
    {
        $stmt = $this->pdo->prepare(
            'SELECT * FROM UTILISATEUR WHERE id = ? LIMIT 1'
        );
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (!$row) return null;

        return new Utilisateur(
            $row['id'],
            $row['nom'],
            $row['email'],
            $row['mot_de_passe'],
            $row['role'],
            (bool) $row['actif']
        );
    }
    
}
