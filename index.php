<?php

session_start();

$controller = isset($_GET['controller'])? $_GET['controller']: 'index';
$method = isset($_GET['method'])? $_GET['method']: 'index';

spl_autoload_register(function ($class){
  if (file_exists("controllers/{$class}.php")){
    require_once "controllers/{$class}.php";
  }elseif (file_exists("models/{$class}.php")){
    require_once "models/{$class}.php";
  }else{
    die('No se logro encontrar el archivo');
  }
});

$controller ="{$controller}Controller";
$controller = new $controller();

call_user_func([$controller, $method]);

?>