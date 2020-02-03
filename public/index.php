<?php
require __DIR__."/../vendor/autoload.php";

$controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : 'login';
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';

try{
    $controllerName = 'App\Controller\\'.ucfirst($controller).'Controller';
    $controller = new $controllerName();
    $controller->$action();

}catch (\Exception $e){
    echo '<h1>Exception : '.$e->getMessage().'</h1>';
}
