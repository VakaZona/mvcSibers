<?php

namespace App\Controllers;

use Core\Controller;
use \Core\View;
use \App\Models;

class Update extends \Core\Controller
{
    public function indexAction()
    {
        $id = $_GET['id'];
        $user = Models\User::getOneUser($id);
        View::renderTemplate('Update/index.twig', ['user' => $user]);
    }

    public function updateAction()
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $aboutUser = $_POST['about_user'];
        $user = Models\User::updateUser($id, $username, $password, $aboutUser);
        echo 'User successfully update';
        View::renderTemplate('Update/index.twig', ['user' => $user]);
    }

}
