<?php

namespace Framework\core;

class Router
{
    private array $route = ['controller' => 'home', 'action' => 'index'];
    public static array $params = [];

    private function add($request): void
    {

        $path = explode('/', htmlspecialchars(mb_substr($request, 1)));
        foreach ($path as $key => $value) {
            if (!empty($value) && $key === 0) {
                $this->route['controller'] = $value;
            } elseif (!empty($value) && $key === 1) {
                $this->route['action'] = $value;
            } else {
                self::$params[] .= htmlspecialchars($value);
            }
        }
    }

    private function match($request): void
    {
        $this->add($request);
        $controller = $this->route['controller'];
        $view = $this->route['action'];
        $class = 'App\controllers\\' . ucfirst($controller) . 'Controller';

        if (class_exists($class)) {
            $action = $view . 'Action';
            if (method_exists($class, $action)) {
                $cObj = new $class($this->route['controller']);
                $cObj->$action();
            } else {
                echo '404 EROR';
            }
        } else {
            echo '404 EROR';
        }
    }


    public static function run($request): void
    {
        $obj = new self();
        $obj->match($request);
    }

    public static function getParams(): array
    {
        return self::$params;
    }
}
