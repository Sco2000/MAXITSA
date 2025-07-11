<?php
namespace App\controller;
use App\service\PersonneService;
use App\service\CompteService;
use App\core\abstract\AbstractController ;
use App\core\Session;

class CompteController extends AbstractController
{
    private CompteService $compteService;
    private PersonneService $personneService;

    public function __construct()
    {
        parent::__construct();
        $this->personneService = new PersonneService();
        $this->compteService = new CompteService();
    }

    public function create (){
        $this->renderHtml("commandes/form");
    }
    public function index(){
        $user = $this->session->get('user');
        // var_dump($user); die;
        // if($user){
        //     $type = $user["type"];
        // }
        $id = $user->getId();
        // var_dump($id); die;
        $data = $this->compteService->getSolde($id);
        // var_dump($type); die;
        // if($type == "vendeur"){
        //     $data = $this->commandeService->listerCommandes();
        // }else{
        //     // var_dump($type); die;
        //     $this->commandeService->listerCommandesClients($id);
        // }
        $this->session->set('compte', $data->toArray());
        $this->renderHtml("commandes/index");
    }

    public function listerClient(){
        $this->personneService->listerClient("type");
        // $this->renderHtml("commandes/form");
    }

    public function show(){
    }

    public function edit(){
    }

    public function destroy(){
    }


    public function redirect(string $url){
        header("Location: $url");
    }
}