<?php
namespace App\controller;

use App\core\AbstractController;
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
        $login = $_POST['login'];
        $password = $_POST['password'];

        $emailEmpty = Validator::isEmpty($login);
        if($emailEmpty){
            $emailValid = true;
        } else{
            $emailValid = Validator::isEmail($login);
        }
        $passwordEmpty = Validator::isEmpty($password);
        $valid = Validator::isValid();
        $errors = Validator::getErrors();
        // var_dump($errors); die;  
        if($valid){
            $connexion = $this->securityService->seConnecter($login, $password);
        }
        else{
            $errors = Validator::getErrors();
            $this->session->set('errors', $errors);
            // var_dump($_SESSION); die;
            
            $this->renderHtml("connexion/connexion");

        }


        
        // var_dump($_SESSION); die;
        // var_dump($connexion); die;
        if($connexion){
            $user = $connexion->toArray();
            $this->session->set("user", $user);
            return header("Location: /list-commande");
        }else{
            return header("Location: /");
        }
    }

    public function inscription(){
        $this->renderHtml("connexion/inscription");
    }

    public function valideInscription(){
        
        $nom = $_POST['nom'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $telephone = $_POST['telephone'];
        $numeroIdentite = $_POST['numero_identite'];
        $photo = $_POST['document'];
        $loginEmpty = Validator::isEmpty($login);
        $passwordEmpty = Validator::isEmpty($password);
        $telephoneEmpty = Validator::isEmpty($telephone);
        $numeroIdentiteEmpty = Validator::isEmpty($numeroIdentite);
        $photoEmpty = Validator::isEmpty($photo);
        $errors = Validator::getErrors();
        $valid = Validator::isValid();
        var_dump($errors); die;

        // var_dump($photo); die;
        // $errors['nom'] = Validator::isEmpty($nom);
        // $errors['login'] = Validator::isEmpty($login);
        // $errors['password'] = Validator::isEmpty($password);
        // $errors['telephone'] = Validator::isEmpty($telephone);
        // $errors['numero_identite'] = Validator::isEmpty($type);
        // $valid = Validator::isValid();
        // $errors =Validator::getErrors();
        // var_dump($errors); die;

        $newCompte = $this->securityService->inscription($nom, $login, $password, $telephone, $numeroIdentite, $photo, TypeEnum::PRINCIPALE);
        if($newCompte){
            $success['message'] = "Votre compte a été crée avec succès";
            $this->session->set("success", $success);
            $this->renderHtml("connexion/inscription");
        }
        // var_dump($newCompte); die;
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