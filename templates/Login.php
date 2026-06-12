<?php
session_start();
require_once __DIR__ . '/../../config/database.php';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $pdo->prepare("
        SELECT id, nom, email, password, role, actif
        FROM UTILISATEUR
        WHERE email = ?
        LIMIT 1
    ");

    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['actif'] == 1 && password_verify($password, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['role'] = $user['role'];

        switch ($user['role']) {

            case 'ADMIN':
                header('Location: /farmafefo/templates/admin/dashboard.php');
                exit;

            case 'PHARMACIEN':
                header('Location: /farmafefo/templates/pharmacien/dashboard.php');
                exit;

            case 'PREPARATEUR':
                header('Location: /farmafefo/templates/preparateur/dashboard.php');
                exit;

            default:
                $error = 'Rôle utilisateur non reconnu.';
        }

    } else {
        $error = 'Email ou mot de passe incorrect ou compte inactif.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>FarmaFefo – Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-slate-900 flex items-center justify-center p-4">

<div class="w-full max-w-md">

    <!-- Logo -->
    <div class="text-center mb-8">
        <h1 class="text-4xl text-white mb-1">FarmaFefo</h1>
        <p class="text-slate-400 text-sm">
            Gestion de stock pharmaceutique (FEFO)
        </p>
    </div>

    <div class="bg-white rounded-2xl shadow-2xl p-8">

        <h2 class="text-2xl text-slate-800 mb-6">
            Connexion
        </h2>

        <?php if (!empty($error)): ?>
            <div class="bg-red-50 border border-red-200 text-red-700 rounded-xl p-3 mb-5 text-sm">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="space-y-5">

            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1 uppercase">
                    Email
                </label>

                <input type="email" name="email" required
                    class="w-full border rounded-xl px-4 py-3 text-sm"
                    placeholder="admin@pharma.com">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-500 mb-1 uppercase">
                    Mot de passe
                </label>

                <input type="password" name="password" required
                    class="w-full border rounded-xl px-4 py-3 text-sm"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-teal-600 hover:bg-teal-700 text-white font-semibold py-3 rounded-xl">
                Se connecter
            </button>

        </form>

        <div class="mt-6 pt-5 border-t text-xs text-slate-500">
            <p class="font-semibold mb-2">Rôles système :</p>
            <p>ADMIN • PHARMACIEN • PREPARATEUR</p>
        </div>

    </div>

</div>

</body>
</html>