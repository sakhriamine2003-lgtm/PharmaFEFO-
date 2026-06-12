<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-indigo-900 via-purple-900 to-slate-900">

    <div class="w-full max-w-md p-8 rounded-3xl backdrop-blur-lg bg-white/10 border border-white/20 shadow-2xl">

        <div class="text-center mb-8">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-white/20 flex items-center justify-center text-3xl">
                💊
            </div>

            <h2 class="text-3xl font-bold text-white">
                Pharma FEFO
            </h2>

            <p class="text-slate-300 mt-2">
                Connectez-vous à votre compte
            </p>
        </div>

        <form class="space-y-4">

            <input
                type="email"
                placeholder="Adresse email"
                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >

            <input
                type="password"
                placeholder="Mot de passe"
                class="w-full px-4 py-3 rounded-xl bg-white/10 border border-white/20 text-white placeholder-slate-300 focus:outline-none focus:ring-2 focus:ring-indigo-400"
            >

            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-indigo-500 text-white font-semibold hover:bg-indigo-600 transition duration-300"
            >
                Se connecter
            </button>

        </form>

        <p class="text-center text-slate-400 text-sm mt-6">
            Pharma FEFO Management System
        </p>

    </div>

</body>
</html>