<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PharmaFEFO — <?= htmlspecialchars($pageTitle ?? 'Tableau de bord') ?></title>
<style>
  :root{--vert:#1a7f3c;--orange:#e07b00;--rouge:#c0392b;--bg:#f4f6f9;--card:#fff;--border:#dde2ea;}
  *{box-sizing:border-box;margin:0;padding:0}
  body{font-family:'Segoe UI',Arial,sans-serif;background:var(--bg);color:#333}
  header{background:#1a3a5c;color:#fff;padding:1rem 2rem;display:flex;align-items:center;gap:1rem}
  header h1{font-size:1.3rem;font-weight:700}
  nav{background:#224b78}
  nav a{display:inline-block;color:#cde;padding:.6rem 1.2rem;text-decoration:none;font-size:.9rem}
  nav a:hover,nav a.active{background:#1a3a5c;color:#fff}
  main{padding:2rem;max-width:1200px;margin:0 auto}
  .card{background:var(--card);border:1px solid var(--border);border-radius:8px;padding:1.5rem;margin-bottom:1.5rem}
  h2{font-size:1.2rem;margin-bottom:1rem;color:#1a3a5c}
  table{width:100%;border-collapse:collapse;font-size:.9rem}
  th{background:#eef1f7;padding:.6rem .8rem;text-align:left;border-bottom:2px solid var(--border)}
  td{padding:.55rem .8rem;border-bottom:1px solid var(--border)}
  tr:hover td{background:#f9fafb}
  .badge{display:inline-block;padding:.2rem .7rem;border-radius:12px;font-size:.8rem;font-weight:600;color:#fff}
  .badge-vert{background:var(--vert)}
  .badge-orange{background:var(--orange)}
  .badge-rouge{background:var(--rouge)}
  .btn{display:inline-block;padding:.5rem 1rem;border:none;border-radius:6px;cursor:pointer;font-size:.9rem;text-decoration:none}
  .btn-primary{background:#224b78;color:#fff}
  .btn-danger{background:var(--rouge);color:#fff}
  .btn-sm{padding:.3rem .7rem;font-size:.82rem}
  .alert-ok{background:#d4edda;border:1px solid #b8dfc4;color:#155724;padding:.8rem 1rem;border-radius:6px;margin-bottom:1rem}
  .alert-err{background:#f8d7da;border:1px solid #f1aeb5;color:#721c24;padding:.8rem 1rem;border-radius:6px;margin-bottom:1rem}
  .alert-info{background:#cce5ff;border:1px solid #99caff;color:#004085;padding:.8rem 1rem;border-radius:6px;margin-bottom:1rem}
  label{display:block;margin-bottom:.3rem;font-weight:600;font-size:.9rem}
  input,select{width:100%;padding:.5rem .7rem;border:1px solid var(--border);border-radius:5px;font-size:.9rem;margin-bottom:1rem}
  .grid-2{display:grid;grid-template-columns:1fr 1fr;gap:1.5rem}
  @media(max-width:700px){.grid-2{grid-template-columns:1fr}}
</style>
</head>
<body>
<header>
  <div>💊</div>
  <h1>PharmaFEFO — Gestion de stock FEFO</h1>
</header>
<nav>
  <a href="?page=dashboard">🏠 Accueil</a>
  <a href="?page=reception">📦 Réception</a>
  <a href="?page=alertes">🔔 Alertes péremption</a>
  <a href="?page=dispense">💊 Dispensation</a>
  <a href="?page=report">📊 Rapport mensuel</a>
</nav>
<main>
