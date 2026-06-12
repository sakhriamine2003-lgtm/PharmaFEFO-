<?php

class Commande
{
    private string $id;
    private string $reference;
    private string $fournisseur;
    private string $statut;
    private $dateReception;
    private $receptionneePar;

    public function __construct($id , $reference , $fournisseur , $statut , $dateReception , $receptionneePar)
    {
         
        $this->id = $id;
        $this->reference = $reference;
        $this->fournisseur = $fournisseur;
        $this->statut = $statut;
        $this->dateReception = $dateReception;
        $this->receptionneePar = $receptionneePar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(string $id)
    {
        $this->id = $id;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getFournisseur()
    {
        return $this->fournisseur;
    }

    public function setFournisseur( $fournisseur) 
    {
        $this->fournisseur = $fournisseur;
    }

    public function getStatut() 
    {
        return $this->statut;
    }

    public function setStatut($statut) 
    {
        $this->statut = $statut;
    }

    public function getDateReception()
    {
        return $this->dateReception;
    }

    public function setDateReception($dateReception)
    {
        $this->dateReception = $dateReception;
    }

    public function getReceptionneePar()
    {
        return $this->receptionneePar;
    }

    public function setReceptionneePar($receptionneePar) 
    {
        $this->receptionneePar = $receptionneePar;
    }
}