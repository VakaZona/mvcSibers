<?php

namespace App\Controllers;
use App\Models;
use Core\Controller;
use Core\View;

class Logout extends Controller
{
    public function logoutAction()
    {
        unset($_SESSION['user']);
        View::renderTemplate('Login/index.twig');
    }
}

