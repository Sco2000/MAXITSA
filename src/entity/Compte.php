<?php

namespace App\entity;
use App\entity\Commande;
use App\entity\TypeEnum;
use App\core\AbstractEntity;

// class Personne extends AbstractEntity {
//     protected int $id;
//     protected string $nom;
//     protected TypeEnum $type;
//     // protected array $commande=[];

//     public function __construct(int $id=0, string $nom, TypeEnum $type) {
//         $this->id = $id;
//         $this->nom = $nom;
//         $this->type = $type;
//         // $this->commande = [];
//     }

//     public function getId(): int {return $this->id;}

//     public function setId(int $id): bool {
//         $this->id = $id; 
//         return true;
//     }

//     public function getNom(): string {return $this->nom;}

//     public function setNom(string $nom): bool {
//         $this->nom = $nom; 
//         return true;
//     }

//     public function getType(): TypeEnum {return $this->type;}

//     public function setType(TypeEnum $type): bool {
//         $this->type = $type; 
//         return true;
//     }

//     public function getCommande(): Commande {return $this->commande;}
//     public function addCommande(Commande $commande): bool {
//         $this->commande = $commande; 
//         return true;
//     }
    
//     public static function toObject(array $data): static {
//         // var_dump($data); die;

//         return new static($data['id'], 
//         $data['nom'], 
//         $data['type'], 
//         // $data['commande'], 
//         // array_map(fn($item) => new Commande($item['id'], $item['numero'], $item['date'], $item['montant'], $item['commandeProduits']), $data['commande'])
//         );
//     }

//     public function toArray(): array {
//         return [
//             'id' => $this->id,
//             'nom' => $this->nom,
//             'prenom' => $this->prenom,
//             'type' => $this->type->value,
//             // 'commande' => array_map(fn($item) => $item->toArray(), $this->commande)
//         ];
//     }

// }


class Compte
{
    private int $id;
    private string $telephone;
    private float $solde;
    private array $transactions;
    private typeEnum $etat;

    public function __construct(string $telephone='', float $solde=0.00, typeEnum $etat) {
        $this->telephone = $telephone;
        $this->solde = $solde;
        $this->etat = $etat;
    }


    // public function __get($att){
    //     return $this->$att;
    // }

    // public function __set($att, $val){
    //     $this->$att = $val;
    // }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

    public function getSolde(){
        return $this->solde;
    }

    

    public function addTransaction(Transaction $transaction){
        $this->transactions[] = $transaction;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'numero' => $this->telephone,
            'solde' => $this->solde,
            'typeenum' => $this->etat->value,
            // 'transactions' => array_map(fn($item) => $item->toArray(), $this->transactions)
        ];
    }

    public static function toObject(array $data): static {
        return new static($data['numero'], $data['solde'], TypeEnum::from($data['typeenum']));
    }
}