<?php

require_once "autoload.php";

if (isset($GET['controller'])) {
  $nombre_controlador = $GET["controller"]."Controller";
} else {
  die("La pagina no existe");
}

if (class_exists($nombre_controlador)) {
  $controlador = new $nombre_controlador();

  if (isset($GET["action"]) && method_exists($controlador, $GET["action"])) {
    $action = $GET['action'];
    $controlador->$action();
  } else {
    echo "La pagina que buscas no existe";
  }
  
} else {
  echo "La pagina que buscas no existe";
}
