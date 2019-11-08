<?php

class Router {

    public function run () {
        $url = $_SERVER['REQUEST_URI'];

        $path = explode('/', $url);
        $controllerName = $path[2].'Controller';
        $controllerFile = 'app/controller/'.$controllerName.'.php';

        if (file_exists($controllerFile)) {
        
            require_once($controllerFile);

        } else {
            die("page not found");
        }

        $controller = new $controllerName;

        $modelFile = 'app/model/'.$path[2].'Model.php';
        if(file_exists($modelFile)) {
            require_once($modelFile);
        }

        $actionName = $path[3].'Action';
        $controller->$actionName();
        // $controller->$path[2].'Action';

        // var_dump($path);
    }

}

?>