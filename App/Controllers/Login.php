<?php

namespace App\Controllers;

use Core\Controller;
use Core\Model;
use Core\View;
use App\Models;

class Login extends Controller
{
    public function indexAction()
    {
        View::renderTemplate('Login/index.twig');
    }

    public function loginAction()
    {
        $error = '';
        $username = $_POST['login'];
        $password = $_POST['password'];

        $result = Models\User::checkLoginUser($username, $password);
        if (!empty($result)){
            setcookie("login", $result['password'], time() + 50000);
            setcookie("password", $password, time() + 50000);
            $_SESSION['user'] = $result;
            var_dump($_SESSION['user']);
            View::renderTemplate('Home/index.twig');
        } else {
            $error = 'User: ' . $username . ' Password: ' . $password . ' not found';
            echo $error;
            View::renderTemplate('Login/index.twig');
        }
    }
}