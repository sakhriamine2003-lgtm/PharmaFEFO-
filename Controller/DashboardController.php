<?php

class AuthController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);

            $user = $stmt->fetch();

            if ($user && $password === $user['password']) {

                $_SESSION['user'] = [
    'id' => $user['id'],
    'role' => $user['role']
];;

                if ($user['role'] === 'admin') {
                    header('Location: index.php?action=admin_dashboard');
                    exit;
                }

                if ($user['role'] === 'pharmacien') {
                    header('Location: index.php?action=pharmacien_dashboard');
                    exit;
                }

                if ($user['role'] === 'preparateur') {
                    header('Location: index.php?action=preparateur_dashboard');
                    exit;
                }
            }
        }

        require __DIR__ . '/../../templates/auth/login.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php?action=login');
        exit;
    }
}