<?php

namespace App\service;
use  App\repository\PersonneRepository;
use App\repository\CompteRepository;
use App\entity\Utilisateur;
use App\entity\TypeEnum;
use App\repository\ProfilRepository;


class SecurityService {
    private PersonneRepository $personneRepository;
    private CompteRepository $compteRepository;
    private ProfilRepository $profilRepository;

    public function __construct() {
        $this->personneRepository = new PersonneRepository();
        $this->compteRepository = new CompteRepository();
        $this->profilRepository = new ProfilRepository();
    }
    
    public function seConnecter(string $login, string $password): ?Utilisateur {
        return $this->personneRepository->selectByLoginAndPassword($login, $password);
    }

    public function inscription($nom, $login, $password, $telephone, $numeroIdentite, $photo, $type): bool {

        $idProfil = $this->profilRepository->getIdProfil('client');
        // var_dump($idProfil); die;
        $lastInsertId = $this->personneRepository->insert($nom, $login, $password, $idProfil, $numeroIdentite, $photo);
        $this->commandeRepository->insert($lastInsertId, $telephone, $type);
        return true;
    }
}