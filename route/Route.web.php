<?php

namespace App\router;

use App\controller\CommandeController;
use App\controller\SecurityController;
use App\controller\SecurityControlleur;

$routes = [
        '/add-commande' => [
            'controller' => CommandeController::class,
            'method'=> 'create',
            'middlewares' => ['auth', 'isVendeur']
        ],
        '/list-commande' => [
            'controller' => CommandeController::class,
            'method'=> 'index',
            'middleware' => ['auth']
        ],
        '/' => [
            'controller' => SecurityController::class,
            'method'=> 'index'
        ],
        '/valide-commande' => [
            'controller' => CommandeController::class,
            'method'=> 'create'
        ],
        '/login' => [
            'controller' => SecurityController::class,
            'method'=> 'login',
        ],
        '/logout' => [
            'controller' => SecurityController::class,
            'method'=> 'logout'
        ],
        '/forbidden' => [
            'controller' => SecurityController::class,
            'method'=> 'forbidden'
        ],
        '/inscription' => [
            'controller' => SecurityController::class,
            'method'=> 'inscription'
        ],
        '/valid_inscription' => [
            'controller' => SecurityController::class,
            'method'=> 'valideInscription'
        ]
];