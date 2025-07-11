<?php

function auth()
{
    if (!isset($_SESSION['user'])) {
        header('Location: /login');
        exit();
    }
}

function isVendeur()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'vendeur') {
        header('Location: /forbidden');
        exit();
    }
}

function isClient()
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'client') {
        header('Location: /forbidden');
        exit();
    }
}

function runMiddleware(array $middlewares){
    foreach ($middleware as $middleware) {
        $middleware();
    }
}