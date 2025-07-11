<?php

namespace App\entity;
use App\entity\TypeTransaction;

class Transaction
{
    private int $id;
    private string $date;
    private float $montant;
    private TypeTransaction $typeTransaction;

    public function __construct(int $id, string $date, float $montant, TypeTransaction $typeTransaction){
        $this->id=$id;
        $this->date=$date;
        $this->montant;
        $this->typeTransaction=$typeTransaction;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getMontant(){
        return $this->montant;
    }

    public function setMontant($montant){
        $this->montant = $montant;
    }

    public function getTypeTransaction(){
        return $this->typeTransaction;
    }

    public function setTypeTransaction($typeTransaction){
        $this->typeTransaction = $typeTransaction;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'montant' => $this->montant,
            'typeTransaction' => $this->typeTransaction
        ];
    }

    public function toObject(array $data): static {
        return new static($data['id'], $data['date'], $data['montant'], $data['typeTransaction']);
    }
}
