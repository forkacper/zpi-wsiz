<?php

declare(strict_types=1);

spl_autoload_register(function (string $classNamespace) {
    $path = str_replace(['\\', 'App/'], ['/', ''], $classNamespace);
    $path = "src/$path.php";
    require_once($path);
});

session_start();
require_once("src/Utils/debug.php");
$configuration = require_once("config/config.php");

use App\Controller\AbstractController;
use App\Controller\LoginController;
use App\Controller\PageController;
use App\Request;

$request = new Request($_GET, $_POST, $_SERVER, $_SESSION);
AbstractController::initConfiguration($configuration);

if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    (new LoginController($request))->loginAction();
} else {
    (new PageController($request))->run();
}

