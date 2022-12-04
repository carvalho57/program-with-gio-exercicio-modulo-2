<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Views\View;

class HomeController extends Controller{

    public function index() : string{
        return self::view('index', [
            'title' => 'Home'
        ]);
    }
}