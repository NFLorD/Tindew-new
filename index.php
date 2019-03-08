<?php 

session_start();

$controllerName = "StatusesController";

if (!empty($_GET['page']) && strlen($_GET['page']) < 25) {
    $controllerName = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_SPECIAL_CHARS);
}

$method = filter_input(INPUT_GET, 'method', FILTER_SANITIZE_SPECIAL_CHARS);

if (!$method) {
    $method = "index";
}

require "libraries/controllers/$controllerName.php";

$controller = new $controllerName();
$controller->$method();

?>