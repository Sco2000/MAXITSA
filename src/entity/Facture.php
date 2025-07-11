<?php

namespace App\entity;
use App\entity\StatutEnum;

class Facture {
    private int $id;
    private string $numero;
    private string $date;
    private float $montant;
    private float $montantRestant;
    private array $paiement;
    private StatutEnum $statut;

    public function __construct(int $id=0, string $numero='', string $date='', float $montant=0.0, float $montantRestant = 0.0, array $paiement = [], StatutEnum $statut) {
        $this->id = $id;
        $this->numero = $numero;
        $this->date = $date;
        $this->montant = $montant;
        $this->montantRestant = $montantRestant;
        $this->paiement = $paiement;
        $this->statut = $statut;
    }

    public function getId(): int {
        return $this->id;
    }
    public function setId(int $id): bool {
        $this->id = $id;
        return true;
    }

    public function getNumero(): string {
        return $this->numero;
    }

    public function setNumero(string $numero): bool {
        $this->numero = $numero;
        return true;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date): bool {
        $this->date = $date;
        return true;
    }

    public function getMontant(): float {
        return $this->montant;
    }

    public function setMontant(float $montant): bool {
        $this->montant = $montant;
        return true;
    }

    public function getMontantRestant(): float {
        return $this->montantRestant;
    }

    public function setMontantRestant(float $montantRestant): bool {
        $this->montantRestant = $montantRestant;
        return true;
    }

    public function getPaiement(): array {
        return $this->paiement;
    }

    public function addPaiement(array $paiement): bool {
        $this->paiement = $paiement;
        return true;
    }

    public function getType(): TypeEnum {
        return $this->type;
    }

    public function setType(TypeEnum $type): bool {
        $this->type = $type;
        return true;
    }

    public function getStatut(): StatutEnum {
        return $this->statut;
    }
    public function setStatut(StatutEnum $statut): bool {
        $this->statut = $statut;
        return true;
    }

    public function toObject(array $data): static{
        return new static(
            $data['id'],
            $data['numero'],
            $data['date'],
            $data['montant'],
            $data['montantRestant'],
            array_map(fn($item) => new Paiement($item['id'], $item['date'], $item['montant']), $data['paiement']),
            new StatutEnum($data['statut'])
        );
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'date' => $this->date,
            'montant' => $this->montant,
            'montantRestant' => $this->montantRestant,
            'paiement' => array_map(fn($item) => $item->toArray(), $this->paiement),
            'statut' => $this->statut->value
        ];
    }
}
