<?php

namespace App\entity;
use App\entity\Personne;

class Vendeur extends Personne {
    // private string $matricule;
    private string $login;
    private string $password;

    public function __construct(int $id=0, string $nom='', string $login='', string $password='') {
        parent::__construct($id, $nom, TypeEnum::VENDEUR);
        $this->matricule = $matricule;
        $this->login = $login;
        $this->password = $password;
    }

    public function getMatricule(): string {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): bool {
        $this->matricule = $matricule;
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

    public static function toObject(array $data): static {
        $object = parent::toObject($data);
        // $object->setMatricule($data['matricule']);
        $object->setLogin($data['login']);
        $object->setPassword($data['password']);
        return $object;
    }

    public function toArray(): array {
        $array = parent::toArray();
        $array['matricule'] = $this->matricule;
        $array['login'] = $this->login;
        $array['password'] = $this->password;
        return $array;
    }
}