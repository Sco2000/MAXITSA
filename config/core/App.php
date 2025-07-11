<?php

namespace App\core;
use App\service\PersonneService;
use App\service\SecurityService;
use App\service\ProduitService;
use App\service\CommandeService;
use App\repository\PersonneRepository;
use App\repository\ProduitRepository;
use App\repository\CompteRepository;

class App
{
    private static $dependencies = [
        'PersonneService' => PersonneService::class,
        'SecurityService' => SecurityService::class,
        'ProduitService' => ProduitService::class,
        'CommandeService' => CommandeService::class,
        'PersonneRepository' => PersonneRepository::class,
        'ProduitRepository' => ProduitRepository::class,
        'CompteRepository' => CompteRepository::class
    ];

    public static function getDependency($dependencyName){
        if(isset(self::$dependencies[$dependencyName])){
            return self::$dependencies[$dependencyName]::getInstance();
        }
        return null;
    }
}