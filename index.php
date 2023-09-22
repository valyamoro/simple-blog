<?php

include_once 'lib/viewLib.php';

$controller = 'main';
$action = 'index';

if (!empty($_GET['c'])) {
    $controller = $_GET['c'];
}

if (!empty($_GET['a'])) {
    $action = $_GET['a'];
}

$controllerPath = "controllers/{$controller}Controller.php";

$functionName = $controller . '_' . $action;
if (file_exists($controllerPath)) {
    include_once $controllerPath;

    if (function_exists($functionName)) {
        $data = $functionName();
        render($controller, $action, $data);
    }
}

