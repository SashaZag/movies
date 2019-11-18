<?php 
ini_set('display_errors', 0);
include('router.php');
include('core/CoreModel.php');
include('core/CoreController.php');
include('core/CoreView.php');

$router = new Router;
$router->run();

?>