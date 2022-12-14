<?php

namespace App\Controllers;

use Core\Controller;
use Core\Model;
use \Core\View;
use \App\Models;


class Create extends Controller
{
    public function indexAction()
    {
    View::renderTemplate('Create/index.twig');
    }
    public function createAction()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $aboutUser = $_POST['about_user'];
        /*if (!(strlen($username)>=4 and strlen($username)<=10)){
            echo "Username length cannot be shorter than 4 and longer than 10<br>";
        }*/
        $password = password_hash($password, PASSWORD_DEFAULT);

        Models\User::addUser($username, $password, $aboutUser);
        echo "User " . $username . " added successfully (Check home page)";
        View::renderTemplate('Create/index.twig');
    }

}
