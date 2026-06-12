<?php

class MouvementStock
{
    private string $id;
    private $lot;
    private $medicament;
    private string $type;
    private int $quantite;
    private $effectuePar;
    private $effectueLe;

    public function __construct( $id ,$lot , $medicament , $type , $quantite , $effectuePar , $effectueLe ) 
{
        $this->id = $id;
        $this->lot = $lot;
        $this->medicament = $medicament;
        $this->type = $type;
        $this->quantite = $quantite;
        $this->effectuePar = $effectuePar;
        $this->effectueLe = $effectueLe;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getLot()
    {
        return $this->lot;
    }

    public function setLot($lot)
    {
        $this->lot = $lot;
    }

    public function getMedicament()
    {
        return $this->medicament;
    }

    public function setMedicament($medicament)
    {
        $this->medicament = $medicament;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function getEffectuePar()
    {
        return $this->effectuePar;
    }

    public function setEffectuePar($effectuePar)
    {
        $this->effectuePar = $effectuePar;
    }

    public function getEffectueLe()
    {
        return $this->effectueLe;
    }

    public function setEffectueLe($effectueLe)
    {
        $this->effectueLe = $effectueLe;
    }
    
}