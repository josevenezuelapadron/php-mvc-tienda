<?php

require_once "autoload.php";
require_once "views/layout/header.php";
require_once "views/layout/sidebar.php";

if (isset($_GET['controller'])) {
  $nombre_controlador = $_GET["controller"]."Controller";
  $nombre_controlador[0] = strtoupper($nombre_controlador[0]);
} else {
  die("La pagina no existe");
}

if (class_exists($nombre_controlador)) {
  $controlador = new $nombre_controlador();
  
  if (isset($_GET["action"]) && method_exists($controlador, $_GET["action"])) {
    $action = $_GET['action'];
    $controlador->$action();
  } else {
    echo "La pagina que buscas no existe";
  }
  
} else {
  echo "La pagina que buscas no existe, fail nombre controlador";
  echo class_exists($nombre_controlador);
}

require_once "views/layout/footer.php";