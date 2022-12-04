<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Views\View;

abstract class Controller {

    public function view(string $viewName, array $data = []) {
        $view = new View($viewName, $data);
        return $view->render();;
    }

    public function redirectTo(string $location) {
        header('Location: '.$location);
        die();
    }
}