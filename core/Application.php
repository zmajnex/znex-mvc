<?php

namespace Plutonium\Core;

use Plutonium\Core\Router;
use Plutonium\Core\View;

class Application
{
    protected Router $router;

    public function __construct(
        Router $router
    ) {
        $this->router = $router;
    }

    /** Dispatch controller or return not found page
     * @return void
     */
    public function dispatch()
    {
        $route = $this->router->parse();
        $controller = $route['controller'];
        //Check if action exists else set default action = "index"
        if ($route['action']) {
            $action = $route['action'];
        } else {
            $action = "index";
        }
        $actionParams = $route['params'];
        //Params from get methods
        $get = $route['get'];
        // Load controller file and create controller object
        $controllerClass = "Plutonium\Controllers\\" . ucfirst($controller) . 'Controller';
        //Check if controller exists
        if (file_exists("../controllers/" . ucfirst($controller) . "Controller.php")) {
            $controllerInstance = new $controllerClass();
            // Call action method on controller object with params
            call_user_func_array([$controllerInstance, $action], [$actionParams, $get] ?? null);
        } else {
            View::renderNotFound();
        }
    }
}