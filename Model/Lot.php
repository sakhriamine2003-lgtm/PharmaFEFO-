<?php

class Lot
{
    private string $id;
    private $medicament;
    private string $numeroLot;
    private $datePeremption;
    private int $quantiteDisponible;
    private string $statut;
    private $creePar;

    public function __construct($id , $medicament , $numeroLot, $datePeremption , $quantiteDisponible , $statut , $creePar) 
    {
        $this->id = $id;
        $this->medicament = $medicament;
        $this->numeroLot = $numeroLot;
        $this->datePeremption = $datePeremption;
        $this->quantiteDisponible = $quantiteDisponible;
        $this->statut = $statut;
        $this->creePar = $creePar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getMedicament()
    {
        return $this->medicament;
    }

    public function setMedicament($medicament)
    {
        $this->medicament = $medicament;
    }

    public function getNumeroLot()
    {
        return $this->numeroLot;
    }

    public function setNumeroLot($numeroLot)
    {
        $this->numeroLot = $numeroLot;
    }

    public function getDatePeremption()
    {
        return $this->datePeremption;
    }

    public function setDatePeremption($datePeremption)
    {
        $this->datePeremption = $datePeremption;
    }

    public function getQuantiteDisponible()
    {
        return $this->quantiteDisponible;
    }

    public function setQuantiteDisponible($quantiteDisponible)
    {
        $this->quantiteDisponible = $quantiteDisponible;
    }

    public function getStatut()
    {
        return $this->statut;
    }

    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getCreePar()
    {
        return $this->creePar;
    }

    public function setCreePar($creePar)
    {
        $this->creePar = $creePar;
    }
}