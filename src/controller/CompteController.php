<?php
namespace App\controller;
use App\service\PersonneService;
use App\service\CommandeService;
use App\core\AbstractController ;
use App\core\Session;

class CommandeController extends AbstractController
{
    private CommandeService $commandeService;
    private PersonneService $personneService;

    public function __construct()
    {
        parent::__construct();
        $this->personneService = new PersonneService();
        $this->commandeService = new CommandeService();
    }

    public function create (){
        $this->renderHtml("commandes/form");
    }
    public function index(){
        $user = $this->session->get('user');
        if($user){
            $type = $user["type"];
        }
        $id = $user['id'];
        // var_dump($id); die;
        $data = $this->commandeService->listerCommandes($id);
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