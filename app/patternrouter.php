<?php
namespace App;

class PatternRouter
{
    private function stripParameters($uri)
    {
        if (str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        $uri = $this->stripParameters($uri);

        $explodedUri = explode('/', $uri);

        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = 'home';
        }
        $controllerName = "App\\Controllers\\" . $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = 'index';
        }
        $methodName = $explodedUri[1];

        
        if(!class_exists($controllerName) || !method_exists($controllerName, $methodName)) {
            http_response_code(404);
            return;
        }

        try {            
            $controllerObj = new $controllerName();
            $controllerObj->$methodName();
        } catch(\Error $e) {
            error_log($e->getMessage()); 
            http_response_code(500);
            echo "An error occurred: " . $e->getMessage();
        }
    }
}