<?php

require_once '../repository/LotRepository.php';
require_once '../config/database.php';

class StockController
{
    private LotRepository $repo;
    private PDO $pdo;

    public function __construct()
    {
        $this->repo = new LotRepository();
        $this->pdo = Database::getInstance();
    }

    public function receptionnerLot(
        int $medicamentId,
        string $numLot,
        string $date,
        int $qte,
        float $prix,
        int $userId
    ): array {

        $d = DateTime::createFromFormat('Y-m-d', $date);

        if (!$d || $d <= new DateTime())
            return ['success' => false, 'message' => 'Date invalide'];

        $lotId = $this->repo->save(
            new Lot(null, $medicamentId, $numLot, $d, $qte, $prix)
        );

        $this->mouvement($lotId, $userId, TypeMouvement::ENTREE, $qte);

        return ['success' => true];
    }}