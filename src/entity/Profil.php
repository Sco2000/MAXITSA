<?php

namespace App\entity;

// class Produit {
//     private int $id;
//     private string $libelle;
//     private int $quantiteStock;
//     private array $commandeProduits = [];

//     public function __construct(int $id=0, string $libelle='', int $quantiteStock=0, array $commandeProduits = []) {
//         $this->id = $id;
//         $this->libelle = $libelle;
//         $this->quantiteStock = $quantiteStock;
//         $this->commandeProduits = $commandeProduits;
//     }

//     public function getId(): int {
//         return $this->id;
//     }

//     public function setId(int $id): bool {
//         $this->id = $id;
//         return true;
//     }

//     public function getLibelle(): string {
//         return $this->libelle;
//     }

//     public function setLibelle(string $libelle): bool {
//         $this->libelle = $libelle;
//         return true;
//     }

//     public function getQuantiteStock(): int {
//         return $this->quantiteStock;
//     }

//     public function setQuantiteStock(int $quantiteStock): bool {
//         $this->quantiteStock = $quantiteStock;
//         return true;
//     }
    
//     public function getCommandeProduits(): array {
//         return $this->commandeProduits;
//     }

//     public function addCommandeProduits(array $commandeProduits): bool {
//         $this->commandeProduits = $commandeProduits;
//         return true;
//     }

//     public function toObject(array $data): static {
//         return new static(
//             $data['id'],
//             $data['libelle'],
//             $data['quantiteStock'],
//             array_map(fn($item) => new CommandeProduit($item['id'], $item['quantiteCommandee'], $item['prixUnitaire']), $data['commandeProduits'])
//         );
//     }

//     public function toArray(): array {
//         return [
//             'id' => $this->id,
//             'libelle' => $this->libelle,
//             'quantiteStock' => $this->quantiteStock,
//             'commandeProduits' => array_map(fn($item) => $item->toArray(), $this->commandeProduits)
//         ];
//     }
// }

class Profil
{
    private int $id;
    private string $nomProfil;

    public function __construct(int $id=0, string $nomProfil='') {
        $this->id = $id;
        $this->nomProfil = $nomProfil;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): bool {
        $this->id = $id;
        return true;
    }

    public function getNomProfil(): string {
        return $this->nomProfil;
    }

        public function setNomProfil(string $nomProfil): bool {
        $this->nomProfil = $nomProfil;
        return true;
    }

    public static function toObject(array $data): static {
        return new static(
            $data['id'],
            $data['nomProfil']
        );
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nomProfil' => $this->nomProfil
        ];
    }


}