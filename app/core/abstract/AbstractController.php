<?php

namespace App\core\abstract;
use App\core\Session;
use App\entity\Compte;

abstract class AbstractController
{
    protected Session $session;
    protected $commonlayout = "base";

    public function __construct(){
        $this->session =  Session::getInstance();    
    }

    abstract public function index();
    abstract public function show();
    abstract public function create();
    abstract public function edit();
    abstract public function destroy();
    public function renderHtml(string $view, array $data = []){
        extract($data);
        $errors = $this->session->get('errors');
        $this->session->unset('errors');
        $success = $this->session->get('success');
        $this->session->unset('success');
        // var_dump($errors); die;

        if($errors){
            // var_dump(isset($errors['empty']));
            extract($errors);
        }
        $compteArray = $this->session->get('compte');
        if($compteArray){
            $compte = Compte::toObject($compteArray);
            extract($compteArray);
        }

        if($success){
            extract($success);
            // var_dump($success); die;
        }

        ob_start(); 
        require_once "../templates/".$view.".html.php";
        $containForLayout = ob_get_clean();
        $layout = "../templates/layout/".$this->commonlayout.".layout.php";
        require_once $layout;
      
        // require_once "../templates/connexion/connexion.html.php";
   }
}