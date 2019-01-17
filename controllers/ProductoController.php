<?php

require_once "models/producto.php";

class productoController {
  public function index() {
    require_once "views/producto/destacados.php";
  }

  public function gestion() {
    Utils::isAdmin();
    $producto = new Producto();
    $productos = $producto->getAll();

    require_once "views/producto/gestion.php";
  }

  public function crear() {
    Utils::isAdmin();
    require_once "views/producto/crear.php";
  }

  public function save() {
    Utils::isAdmin();
    if (isset($_POST)) {
      $categoria_id = isset($_POST['categoria_id']) ? trim($_POST['categoria_id']) : false;
      $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : false;
      $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : false;
      $precio = isset($_POST['precio']) ? trim($_POST['precio']) : false;
      $stock = isset($_POST['stock']) ? trim($_POST['stock']) : false;
      // $oferta = isset($_POST['oferta']) ? trim($_POST['oferta']) : false;
      // $imagen = isset($_POST['imagen']) ? trim($_POST['imagen']) : false;

      if ($nombre && $descripcion && $precio && $stock && $categoria_id) {
        $producto = new Producto();
        $producto->setNombre($nombre);
        $producto->setCategoria_id($categoria_id);
        $producto->setDescripcion($descripcion);
        $producto->setPrecio($precio);
        $producto->setStock($stock);
        // $producto->setOferta($oferta);
        // $producto->setImagen($imagen);

        $save = $producto->save();

        if ($save) {
          $_SESSION['producto'] = "complete";
        } else {
          $_SESSION['producto'] = "failed";
        }
        
      } else {
        $_SESSION['producto'] = "failed";
      }

    } else {
      $_SESSION['producto'] = "failed";
    }
    header("Location:".base_url."producto/gestion");
  }
}