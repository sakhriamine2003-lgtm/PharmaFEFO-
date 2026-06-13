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
    }


    public function sortieFEFO(
        int $medicamentId,
        int $qteDemandee,
        int $userId
    ): array {

        $reste = $qteDemandee;

        foreach ($this->repo->findByMedicamentFEFO($medicamentId) as $lot) {

            if ($reste <= 0) break;

            $qte = min($reste, $lot->getQuantite());

            $lot->decremente($qte);
            $this->repo->update($lot);

            $this->mouvement(
                $lot->getId(),
                $userId,
                TypeMouvement::SORTIE,
                $qte
            );

            $reste -= $qte;
        }

        return $reste > 0
            ? ['success' => false, 'message' => 'Stock insuffisant']
            : ['success' => true];
    }



    
    private function mouvement(
        int $lotId,
        int $userId,
        TypeMouvement $type,
        int $qte
    ): void {

        $this->pdo->prepare("
            INSERT INTO mouvements_stock
            (lot_id, utilisateur_id, type, quantite, date)
            VALUES (?, ?, ?, ?, NOW())
        ")->execute([
            $lotId,
            $userId,
            $type->value,
            $qte
        ]);
    }
}



