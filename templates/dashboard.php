<?php
$pageTitle = 'Tableau de bord';
require 'templates/header.php';

$rouge  = ((['criticite'] === 'rouge'));
$orange = ((['criticite'] === 'orange'));
?>


<div class="alert-err">
    <a href="?page=alertes&filtre=rouge">Voir →</a>
</div>
<div class="grid-2">

    <div class="card">
        <h2>📦 Réception d'un nouveau lot</h2>
        <a href="?page=reception" class="btn btn-primary">Enregistrer un lot</a>
    </div>

    <div class="card">
        <h2>🔔 Alertes péremption</h2>
        <p>
            <span class="badge badge-rouge"><?= $rouge ?> Rouge</span>
            <span class="badge badge-orange"><?= $orange ?> Orange</span>
        </p>
        <a href="?page=alertes" class="btn btn-primary">Voir les alertes</a>
    </div>

    <div class="card">
        <h2>💊 Dispensation FEFO</h2>
        <a href="?page=dispense" class="btn btn-primary">Dispenser</a>
    </div>

    <div class="card">
        <h2>📊 Rapport mensuel</h2>
        <a href="?page=report" class="btn btn-primary">Générer</a>
    </div>

</div>

<?php require 'templates/header.php'; ?>