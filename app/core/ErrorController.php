<?php

namespace App\core;

class ErrorController {
    public function error404() {
        require_once "../config/error/error.html";
    }
 }