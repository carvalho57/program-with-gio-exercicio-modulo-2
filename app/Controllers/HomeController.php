<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Views\View;

class HomeController {

    public function index() {
        return View::render('index');
    }
}