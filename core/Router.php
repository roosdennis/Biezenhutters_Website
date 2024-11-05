<!-- core/Router.php -->
<?php

class Router {
    public static function route($url) {
        // Haal de controller en actie op uit de URL
        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $method = !empty($url[1]) ? $url[1] : 'index';

        // Controleer of de controller bestaat
        if (file_exists('../app/controllers/' . $controllerName . '.php')) {
            require_once '../app/controllers/' . $controllerName . '.php';
            $controller = new $controllerName();

            // Controleer of de methode bestaat
            if (method_exists($controller, $method)) {
                $controller->{$method}();
            } else {
                echo "Methode $method niet gevonden.";
            }
        } else {
            echo "Controller $controllerName niet gevonden.";
        }
    }
}
