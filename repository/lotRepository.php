<?php

declare(strict_types=1);

require_once __DIR__ . '/../Model/Lot.php';
require_once __DIR__ . '/../Model/MouvementStock.php';

class LotRepository
{
    public function __construct(private PDO $pdo) {}

    private function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function uuid(): string
    {
        return uniqid();
    }

    public function save(Lot $lot): string
    {
        $id = $this->uuid();

        $this->pdo->prepare('
            INSERT INTO LOT
            (id, medicament_id, numero_lot, date_peremption,
             quantite_disponible, statut, cree_par)
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ')->execute([
            $id,
            $lot->getMedicamentId(),
            $lot->getNumeroLot(),
            $lot->getDatePeremption()->format('Y-m-d'),
            $lot->getQuantite(),
            $lot->getStatut(),
            $lot->getCreePar(),
        ]);

        return $id;
    }

    public function update(Lot $lot): void
    {
        $this->pdo->prepare('
            UPDATE LOT
            SET quantite_disponible = ?, statut = ?
            WHERE id = ?
        ')->execute([
            $lot->getQuantite(),
            $lot->getStatut(),
            $lot->getId(),
        ]);
    }

    public function findByMedicamentFEFO(string $medicamentId): array
    {
        $rows = $this->fetchAll('
            SELECT * FROM LOT
            WHERE medicament_id = ?
              AND statut = "DISPONIBLE"
              AND quantite_disponible > 0
            ORDER BY date_peremption ASC
        ', [$medicamentId]);

        return array_map(fn($r) => new Lot(
            $r['id'],
            $r['medicament_id'],
            $r['numero_lot'],
            new DateTime($r['date_peremption']),
            (int)$r['quantite_disponible'],
            $r['statut'],
            $r['cree_par']
        ), $rows);
    }

    public function findAlertes(int $joursOrange = 90, int $joursRouge = 30): array
    {
        $rows = $this->fetchAll('
            SELECT l.*, m.nom_commercial
            FROM LOT l
            JOIN MEDICAMENT m ON m.id = l.medicament_id
            WHERE l.statut = "DISPONIBLE"
              AND l.quantite_disponible > 0
              AND l.date_peremption <= DATE_ADD(NOW(), INTERVAL ? DAY)
            ORDER BY l.date_peremption ASC
        ', [$joursOrange]);

        foreach ($rows as &$row) {
            $jours = (new DateTime())->diff(new DateTime($row['date_peremption']))->days;
            $row['criticite'] = $jours <= $joursRouge ? 'rouge' : 'orange';
        }

        return $rows;
    }

    public function saveMouvement(MouvementStock $m): void
    {
        $this->pdo->prepare('
            INSERT INTO MOUVEMENT_STOCK
            (id, lot_id, medicament_id, type, quantite, effectue_par)
            VALUES (?, ?, ?, ?, ?, ?)
        ')->execute([
            $this->uuid(),
            $m->getLotId(),
            $m->getMedicamentId(),
            $m->getType(),
            $m->getQuantite(),
            $m->getEffectuePar(),
        ]);
    }
}