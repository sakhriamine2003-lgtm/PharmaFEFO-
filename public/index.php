<?php

session_start();

require_once '../config/database.php';
require_once '../Controller/StockController.php';
require_once '../Controller/DashboardController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (!isset($_SESSION['user_id']) && $uri != '/login') {
    header('Location: /login');
    exit;
}

function user() {
    if (!isset($_SESSION['user_id'])) return null;

    $pdo = Database::getInstance();
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id=?");
    $stmt->execute([$_SESSION['user_id']]);

    return $stmt->fetch();
}

switch ($uri) {

    case '/login':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $pdo = Database::getInstance();

            $stmt = $pdo->prepare(
                "SELECT * FROM utilisateurs WHERE email=?"
            );

            $stmt->execute([$_POST['email']]);

            $u = $stmt->fetch();

            if ($u && password_verify($_POST['password'], $u['mot_de_passe'])) {
                $_SESSION['user_id'] = $u['id'];
                header('Location: /dashboard');
                exit;
            }

            echo "Login incorrect";
        }

        include '../templates/login.php';
        break;

    case '/logout':
        session_destroy();
        header('Location:/login');
        break;

    case '/dashboard':

        $ctrl = new DashboardController();
        $data = $ctrl->index(user());

        include '../templates/dashboard.php';
        break;

    case '/stock/reception':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $ctrl = new StockController();

            print_r(
                $ctrl->receptionnerLot(
                    $_POST['medicament_id'],
                    $_POST['numero_lot'],
                    $_POST['date_peremption'],
                    $_POST['quantite'],
                    $_POST['prix_achat'],
                    $_SESSION['user_id']
                )
            );
        }

        include '../templates/reception.php';
        break;

    default:
        http_response_code(404);
        echo "404";
}