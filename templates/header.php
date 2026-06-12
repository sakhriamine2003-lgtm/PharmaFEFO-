<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FarmaFefo – <?= htmlspecialchars($pageTitle ?? '') ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-slate-100">

<nav class="bg-teal-700 text-white px-6 py-3 flex items-center justify-between shadow">
    <span class="font-semibold text-lg">FarmaFefo</span>
    <div class="flex items-center gap-4 text-sm">
        <span class="opacity-75"><?= htmlspecialchars($_SESSION['nom'] ?? '') ?></span>
        <a href="/logout" class="bg-teal-600 hover:bg-teal-500 px-3 py-1 rounded">Déconnexion</a>
    </div>
</nav>

<main class="max-w-5xl mx-auto px-4 py-8">
