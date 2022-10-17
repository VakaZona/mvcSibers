<?php

namespace  App\Controllers;

use App\Models;
use \Core\View;

class Delete extends \Core\Controller
{
    public function deleteAction()
    {
        $id = $_GET['id'];
        Models\User::deleteUser($id);
        View::renderTemplate('Delete/index.twig');

    }
}