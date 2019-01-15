<?php

require_once "models/usuario.php";

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
      $usuario = new Usuario();
      $usuario->setNombre($_POST['nombre']);
      $usuario->setApellidos($_POST['apellidos']);
      $usuario->setEmail($_POST['email']);
      $usuario->setPassword($_POST['password']);
      $save = $usuario->save();

      if ($save) {
        $_SESSION["register"] = "complete";
      } else {
        $_SESSION["register"] = "failed";
      }
    } else {
      $_SESSION["register"] = "failed";
      header("Location:".base_url."usuario/registro");
    }
    header("Location:".base_url."usuario/registro");
  }
}