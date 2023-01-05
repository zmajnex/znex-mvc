<?php

namespace Plutonium\Core;

class View
{

    public static function render($view, $data = [])
    {
        if(is_array($data)){
            extract($data);
        }
        $file = "../views/$view.php";
        if (file_exists($file)) {
            require_once $file;
        } else {
            self::renderNotFound();
        }
    }

    public static function renderNotFound()
    {
        require "../404/404.php";
    }

    public static function renderWithTemplates($header,$menu,$view,$footer,$data = [])
    {
     self::render($header,["title"=>'Home page'] ?? null);
     self::render($menu,null);
     self::render($view,$data ?? null);
     self::render($footer,null);
    }
}