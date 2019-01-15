<?php

class usuarioController {
  public function index() {
    echo "Controlador usuarios, accion index";
    // require_once "views/producto/destacados.php";
  }

  public function registro() {
    require_once "views/usuario/registro.php";
  }

  public function save() {
    if (isset($_POST)) {
      var_dump($_POST);
    }
  }
}