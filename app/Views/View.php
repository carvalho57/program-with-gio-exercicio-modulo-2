<?php

namespace App\Views;

use App\Exceptions\ViewNotFoundException;

class View {
    
    public static function render(string $name, array $values = []) : string{
        $path = __DIR__ . "/${name}.php";        

        if(!file_exists($path)) {
            throw new ViewNotFoundException();
        }

        ob_start();
        include $path;

        $html = ob_get_clean();
        return (string)$html;
    }

    
}