<?php

namespace Plutonium\Core;

class Router
{
    /**
     * @return array
     */
    public function parse()
    {
        // Get request URL and parameters
        if ($_SERVER['REQUEST_URI'] != "/favicon.ico") {
            $url = $_SERVER['REQUEST_URI'];
            $params = $_GET;
        }
        // Initialize default action and params
        $action = 'index';
        $actionParams = [];

        // Parse URL and determine action and params
        if ($url != '/') {
            $parts = explode('/', $url);
            $controller = $parts[1];
            $action = $parts[2];
            if (count($parts) > 3) {
                $actionParams = array_slice($parts, 3) ?? [];
            }
        } else {
            return [
                'controller' => 'home',
                'action' => 'index',
                'params' => [],
                'get' => []
            ];
        }

        // Return action and params
        return [
            'controller' => $controller,
            'action' => $action,
            'params' => $actionParams,
            'get' => $params
        ];
    }


}