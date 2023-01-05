<?php

namespace Plutonium\Controllers;
use Plutonium\Core\View;

class HomeController
{
    public function index()
    {
        View::render('index',null);
    }

    /** $data can be null is $data which we pass from controller
     * Also we do not need to pass data from controller we could pass data array as a second param in function renderer
     * @param $data
     * @return void
     */
    public function home($data)
    {
         View::renderWithTemplates('header','menu','home','footer',["text"=>'Lorem Ipsum']);
    }
}