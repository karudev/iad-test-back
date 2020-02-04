<?php
/**
 * FrontController
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
require __DIR__."/../vendor/autoload.php";
session_start();

$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'security';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

try{
    $controllerName = 'App\Controller\\'.ucfirst($controller).'Controller';
    $controller = new $controllerName();
    $controller->$action();

}catch (\Exception $e){
    echo '<h1>Exception : '.$e->getMessage().'</h1>';
}
