<?php

namespace App\entity;

class CommandeProduit {
    private int $id;
    private int $quantiteCommandee;
    private float $prixUnitaire;
    private float $sousTotal;
    private Commande $commande;
    private Produit $produit;

    public function __construct(int $id=0, int $quantiteCommandee=0, float $prixUnitaire=0.0) {
        $this->id = $id;
        $this->quantiteCommandee = $quantiteCommandee;
        $this->prixUnitaire = $prixUnitaire;
        $this->sousTotal = $quantiteCommandee * $prixUnitaire;
        $this->commande = new Commande();
        $this->produit = new Produit();
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): bool {
        $this->id = $id;
        return true;
    }

    public function getCommande(): Commande {
        return $this->commande;
    }

    public function setCommande(Commande $commande): bool {
        $this->commande = $commande;
        return true;
    }

    public function getProduit(): Produit {
        return $this->produit;
    }

    public function setProduit(Produit $produit): bool {
        $this->produit = $produit;
        return true;
    }

    public function getQuantiteCommandee(): int {
        return $this->quantiteCommandee;
    }

    public function setQuantiteCommandee(int $quantiteCommandee): bool {
        $this->quantiteCommandee = $quantiteCommandee;
        $this->calculerSousTotal();
        return true;
    }

    public function getPrixUnitaire(): float {
        return $this->prixUnitaire;
    }

    public function setPrixUnitaire(float $prixUnitaire): bool {
        $this->prixUnitaire = $prixUnitaire;
        $this->calculerSousTotal();
        return true;
    }

    public function getSousTotal(): float {
        return $this->sousTotal;
    }

    private function calculerSousTotal(): void {
        $this->sousTotal = $this->quantiteCommandee * $this->prixUnitaire;
    }

    public function recalculerSousTotal(): float {
        $this->calculerSousTotal();
        return $this->sousTotal;
    }
}