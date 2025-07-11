<?php
namespace App\controller;

use App\core\abstract\AbstractController;
use App\service\SecurityService;
use App\entity\Vendeur;
use App\core\Validator;
use App\core\Session;
use App\entity\TypeEnum;

class SecurityController extends AbstractController
{
    private ?SecurityService $instance= null;

    public function __construct(){
        parent::__construct(); 
        $this->commonlayout = "security";
        $this->securityService = new SecurityService(); 
    }

public function login(): ?Utilisateur{
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';

    // Définir les règles de validation
    $rules = [
        'login' => ['required'],
        'password' => ['required']
    ];

    // Valider les données
    $validator = Validator::getInstance();
    $isValid = $validator->validate(['login' => $login, 'password' => $password], $rules);
    $errors = Validator::getErrors();
    
    if (!$isValid) {
        // Gérer les erreurs (par exemple, afficher un message ou rediriger)
        $this->session->set('errors', $errors);
        $this->renderHtml("connexion/connexion");
        return null;
    }
    
    // Si valide, procéder à la connexion
    $user = $this->securityService->seConnecter($login, $password);
    // var_dump($user); die;
    if ($user) {
        $this->session->set("user", $user);
        // Rediriger ou afficher la page d'accueil
        header("Location: /list-commande");
        exit;
    } else {
        $errors['login'] = "Login ou mot de passe incorrect";
        $this->renderHtml("connexion/connexion", ['errors' => $errors]);
        return null;
    }
}

    public function inscription(){
        $this->renderHtml("connexion/inscription");
    }


public function valideInscription(){
    extract($_POST);

    // Définir les règles de validation
    $rules = [
        'nom' => ['required'],
        'login' => ['required'],
        'password' => ['required'],
        'telephone' => ['required', ['isSenegalPhone']],
        'numero_identite' => ['required', ['isCNI']],
        'document' => ['required']
    ];

    // Valider les données
    $validator = Validator::getInstance();
    $isValid = $validator->validate([
        'nom' => $nom,
        'login' => $login,
        'password' => $password,
        'telephone' => $telephone,
        'numero_identite' => $numeroIdentite,
        'document' => $photo
    ], $rules);
    $errors = Validator::getErrors();
    // var_dump($isValid); die;
    if (!$isValid) {
        $this->session->set('errors', $errors);
        $this->renderHtml("connexion/inscription");
        return;
    }

    $newCompte = $this->securityService->inscription($nom, $login, $password, $telephone, $numeroIdentite, $photo, TypeEnum::PRINCIPALE);
    if($newCompte){
        $success['message'] = "Votre compte a été crée avec succès";
        $this->session->set("success", $success);
        $this->renderHtml("connexion/inscription");
    }
}


    public function forbidden() : Returntype {
        
    }
    public function logout(){
        
        if($this->session->isset("user")){
            $this->session->unset("user");
        }
        // var_dump($_SESSION); die;
        header("Location: /");
        // session_start();
        // var_dump($_SESSION); die;

    }   
    public function index(){
        $this->renderHtml("connexion/connexion");
    }

    public function show(){

    }
    public function create(){

    }
    public function edit(){

    }
    public function destroy(){

    }

    
}