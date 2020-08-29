<?php

class Router
{

    private $routes;

    public function __construct()
    {
        $routesFile = ROOT.'/config/routes.php';
        $this->routes = include_once($routesFile);
    }

    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function start()
    {
        $uri = $this->getUri();

        foreach($this->routes as $pattern => $path) {

            if(preg_match("~^$pattern$~", $uri))  {

                $internalPath = preg_replace("~^$pattern$~", $path, $uri);

                $segments = explode('/', $internalPath);

                $_SESSION['uri'] = $uri;
                
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));

                $parameters = $segments;

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                if(file_exists($controllerFile))    {
                    require_once($controllerFile);
                }

                $controllerObject = new $controllerName;
                $actionStart = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if($actionStart != null)    {
                    break;
                }
            }
        }
    }

}

?>