<?php

namespace App\service;
use App\repository\CompteRepository;
use App\entity\Compte;

class CompteService {
    private array $commandes = [];
    private CompteRepository $compteRepository;

    public function __construct() {
        $this->compteRepository = new CompteRepository();
    }

    public function addCommande(Commande $commande): bool {
        $this->compteRepository->insertCommande($commande);
        return true;
    }

    public function getSolde($id): null | Compte {
        // var_dump($id); die;
        return $this->compteRepository->selectPrincipalCompte($id);
    }

    public function listerCommandesClients(int $id): null | Compte {
        return $this->compteRepository->selectCommandesClients($id);
    }
}