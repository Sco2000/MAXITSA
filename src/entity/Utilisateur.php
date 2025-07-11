<?php

namespace App\entity;
use App\entity\Personne;
use App\entity\TypeEnum;

// class Client extends Personne {
//     private string $telephone;


//     public function __construct(int $id=0, string $nom='', string $telephone='') {
//         parent::__construct($id, $nom, TypeEnum::CLIENT);
//         $this->telephone = $telephone;
//     }

//     public function getTelephone(): string {
//         return $this->telephone;
//     }
//     public function setTelephone(int $telephone): bool {
//         $this->telephone = $telephone;
//         return true;
//     }

//     public static function toObject(array $data): static {
//         $object = parent::toObject($data);
//         $object->setTelephone($data['telephone']);
//         return $object;
//     }

//     public function toArray(): array {
//         $array = parent::toArray();
//         $array['telephone'] = $this->telephone;
//         return $array;
//     }
// }

// namespace App\Entity;

class Utilisateur
{
    private int $id;
    private string $nom;
    private string $login;
    private string $password;
    private string $numerocarteIdentite;
    private string $photo;
    private Profil $profil;
    // private array $comptes;

    // public function __get($att){
    //     return $this->$att;
    // }

    // public function __set($att, $val){
    //     $this->$att = $val;
    // }

    public function __construct(int $id=0, string $nom='', string $login='', string $password='', int $numerocarteIdentite=0, string $photo='', Profil $profil = new Profil()) {
        $this->id = $id;
        $this->nom = $nom;
        $this->login = $login;
        $this->password = $password;
        $this->numerocarteIdentite = $numerocarteIdentite;
        $this->photo = $photo;
        $this->profil = $profil;
        // $this->comptes = [];
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): bool {
        $this->id = $id;
        return true;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function setNom(string $nom): bool {
        $this->nom = $nom;
        return true;
    }

    public function getLogin(): string {
        return $this->login;
    }

    public function setLogin(string $login): bool {
        $this->login = $login;
        return true;
    }
    public function getPassword(): string {
        return $this->password;
    }

    public function setPassword(string $password): bool {
        $this->password = $password;
        return true;
    }

    public function getNumerocarteIdentite(): int {
        return $this->numerocarteIdentite;
    }

    public function setNumerocarteIdentite(int $numerocarteIdentite): bool {
        $this->numerocarteIdentite = $numerocarteIdentite;
        return true;
    }

    public function getPhoto(): string {
        return $this->photo;
    }

    public function setPhoto(string $photo): bool {
        $this->photo = $photo;
        return true;
    }

    public function getProfil(): Profil {
        return $this->profil;
    }

    public function setProfil(Profil $profil): bool {
        $this->profil = $profil;
        return true;
    }
    // public function getComptes(): array {
    //     return $this->comptes;
    // }

    // public function setComptes(array $comptes): bool {
    //     $this->comptes = $comptes;
    //     return true;
    // }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'login' => $this->login,
            'password' => $this->password,
            'numerocarteIdentite' => $this->numerocarteIdentite,
            'photo' => $this->photo,
            'profil' => $this->profil->toArray(),
            // 'comptes' => array_map(fn($item) => $item->toArray(), $this->comptes)
        ];
    }

    public static function toObject(array $data): static {
        $object = new static();
        $object->setId($data['id']);
        $object->setNom($data['nom']);
        $object->setLogin($data['login']);
        $object->setPassword($data['password']);
        $object->setNumerocarteIdentite($data['numerocarteidentite']);
        $object->setPhoto($data['photoidentite']);
        // $object->setComptes(array_map(fn($item) => Compte::toObject($item), $data['comptes']));
        return $object;
    }

}