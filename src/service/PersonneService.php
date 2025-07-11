<?php

namespace App\service;
use App\repository\PersonneRepository;

class PersonneService {
    private $filters = ["Client", "Vendeur"];
    private array $personnes = [];
    private PersonneRepository $personneRepository;

    public function __construct() {
        $this->personneRepository = new PersonneRepository();
    }
    public function listerClient(string $filters): array {
        
        $pesonnesDate = $this->personneRepository->selectBytype($filters);
        // var_dump($personnesDate); die;
        return array_map(function($personne) {
            return $personne->toObject($personne);
        }, $personnesDate); 
    }
}