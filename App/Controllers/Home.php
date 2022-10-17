<?php

namespace App\Controllers;
use App\Models;
use \Core\View;

class Home extends \Core\Controller
{
    protected function before(){
    }

    protected function after()
    {

    }

    public function indexAction()
    {
        $users = Models\User::getAll();
        View::renderTemplate('Home/index.twig', ['users' => $users]);
    }

}