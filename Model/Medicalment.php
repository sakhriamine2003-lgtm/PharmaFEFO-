<?php

class Medicament
{
    private string $id;
    private string $nomCommercial;
    private string $codeCip13;
    private float $prixAchatUnitaire;
    private int $seuilAlerteStock;

    public function __construct( $id , $nomCommercial , $codeCip13 , $prixAchatUnitaire , $seuilAlerteStock )
    {
        $this->id = $id;
        $this->nomCommercial = $nomCommercial;
        $this->codeCip13 = $codeCip13;
        $this->prixAchatUnitaire = $prixAchatUnitaire;
        $this->seuilAlerteStock = $seuilAlerteStock;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getNomCommercial()
    {
        return $this->nomCommercial;
    }

    public function setNomCommercial($nomCommercial)
    {
        $this->nomCommercial = $nomCommercial;
    }

    public function getCodeCip13()
    {
        return $this->codeCip13;
    }

    public function setCodeCip13($codeCip13)
    {
        $this->codeCip13 = $codeCip13;
    }

    public function getPrixAchatUnitaire()
    {
        return $this->prixAchatUnitaire;
    }

    public function setPrixAchatUnitaire($prixAchatUnitaire)
    {
        $this->prixAchatUnitaire = $prixAchatUnitaire;
    }

    public function getSeuilAlerteStock()
    {
        return $this->seuilAlerteStock;
    }

    public function setSeuilAlerteStock($seuilAlerteStock)
    {
        $this->seuilAlerteStock = $seuilAlerteStock;
    }
}