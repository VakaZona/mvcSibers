<?php

namespace App\Controllers;

use Core\Controller;
use \Core\View;
use \App\Models;


class About extends Controller
{
    public function indexAction()
    {
        View::renderTemplate('About/index.twig');
    }
}
