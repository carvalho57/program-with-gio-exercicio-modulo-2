<?php

namespace App\Views;

use App\Exceptions\ViewNotFoundException;

class View {

    public function __construct(protected string $viewName, protected array $data = []) {

    }

    public static  function create(string $viewName, array $data = []) {
        return new static($viewName,$data);
    }

    public function render() : string{
        $viewPath = __DIR__ . "/{$this->viewName}.php";        
        $layoutPath = __DIR__ . "/shared/layout.php";
        if(!file_exists($viewPath)) {
            throw new ViewNotFoundException();
        }

        extract($this->data);
    
        ob_start();
        include $viewPath;
        $html = ob_get_clean();                    
        
        $layout = file_get_contents($layoutPath);

        $renderedView =  str_replace(["{{ content }}", "{{ title }}"], [$html, $this->data['title'] ?? 'Document'], $layout);
        return (string)$renderedView;
    }

    public function __toString()
    {
        return (string)$this->render();
    }
  
}