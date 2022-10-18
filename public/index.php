<?php
session_start();

require_once dirname(__DIR__) . '/vendor/autoload.php';

error_reporting(E_ALL);
set_error_handler('\Core\Errors::errorHandler');
set_exception_handler('\Core\Errors::exceptionHandler');

$router = new Core\Router();
$router->addRoute('', ['controller'=>'Home', 'action'=>'index']);
$router->addRoute('{controller}/{action}');
$router->addRoute('{controller}/{id:\d+}/{action}');
$router->addRoute('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispath($_SERVER['QUERY_STRING']);