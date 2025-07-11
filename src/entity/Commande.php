<?php

namespace App\entity;
use App\entity\Client;
use App\entity\Vendeur;
use App\entity\Facture;
use App\entity\CommandeProduit;
use App\core\AbstractEntity;

class Commande extends AbstractEntity {
    private int $id;
    private string $date;
    private float $montant;
    private Client $client;
    private Vendeur $vendeur;
    // private ?Facture $facture = null;
    private array $commandeProduits = [];

    public function __construct(int $id=0, string $date='', float $montant=0.0, array $commandeProduits = []) {
        $this->id = $id;
        $this->date = $date;
        $this->montant = $montant;
        $this->client= new Client();
        $this->vendeur = new Vendeur();
        // $this->facture = new Facture();
        $this->commandeProduits = $commandeProduits;
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

    public function getClient(): Client {
        return $this->client;
    }

    public function setClient(Client $client): bool {
        $this->client = $client;
        return true;
    }

    public function getVendeur(): Vendeur {
        return $this->vendeur;
    }

    public function setVendeur(Vendeur $vendeur): bool {
        $this->vendeur = $vendeur;
        return true;
    }

    public function getFacture(): Facture {
        return $this->facture;
    }

    public function setFacture(Facture $facture): bool {
        $this->facture = $facture;
        return true;
    }

    public function getCommandeProduits(): array {
        return $this->commandeProduits;
    }

    public function addCommandeProduit(CommandeProduit $commandeProduit): bool {
        $this->commandeProduits[] = $commandeProduit;
        return true;
    }

    public static function toObject(array $data): static {
        return new static(
            $data['id'],
            $data['date'],
            $data['montant'],
        );
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'numero' => $this->numero,
            'date' => $this->date,
            'montant' => $this->montant,
            'client' => $this->client->toArray(),
            'vendeur' => $this->vendeur->toArray(),
            'facture' => $this->facture ? $this->facture->toArray() : null,
            'commandeProduits' => array_map(fn($item) => $item->toArray(), $this->commandeProduits)
        ];
    }
}