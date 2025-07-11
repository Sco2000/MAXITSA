<?php

namespace App\entity;

class Paiement {
    private int $id;
    private string $date;
    private float $montant;

    public function __construct(int $id=0, string $date='', float $montant=0.0) {
        $this->id = $id;
        $this->date = $date;
        $this->montant = $montant;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): bool {
        $this->id = $id;
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

    public function toObject(array $data): static {
        return new static(
            $data['id'],
            $data['date'],
            $data['montant']
        );
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'montant' => $this->montant
        ];
    }
}