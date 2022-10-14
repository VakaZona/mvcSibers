<?php

namespace App\Controllers;

use Core\Controller;
use \Core\View;
use \App\Models;


class Create extends Controller
{
    public function indexAction()
    {
    View::renderTemplate('Create/index.twig');
    }
}
