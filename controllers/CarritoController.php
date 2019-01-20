<?php

require_once "models/producto.php";

class CarritoController {
  public function index() {
    if (isset($_SESSION['carrito'])) {
      $carrito = $_SESSION['carrito'];
    }

    require_once "views/carrito/index.php";
  }

  public function add() {
    if (isset($_GET['id'])) {
      $producto_id = $_GET['id'];
    } else {
      header("Location:".base_url);
    }

    if (isset($_SESSION['carrito'])) {
      $counter = 0;
      foreach ($_SESSION['carrito'] as $indice => $elemento) {
        if ($elemento['id_producto'] == $producto_id) {
          $_SESSION['carrito'][$indice]['unidades']++;
          $counter++;
        }
      }
    } 

    if (!isset($counter) || $counter == 0) {
      $producto = new Producto();
      $producto->setId($producto_id);
      $producto = $producto->getOne();

      if (is_object($producto)) {
        $_SESSION['carrito'][] = array(
          "id_producto" => $producto->id,
          "precio" => $producto->precio,
          "unidades" => 1,
          "producto" => $producto
        );
      }

    }
    header("Location:".base_url."carrito/index");
  }

  public function delete() {
    if (isset($_SESSION['carrito']) && isset($_GET) && isset($_GET['index'])) {
      $index = $_GET['index'];
      unset($_SESSION['carrito'][$index]);
      header("Location:".base_url."carrito/index");
    }
  }

  public function deleteAll() {
    unset($_SESSION['carrito']);
    header("Location:".base_url."carrito/index");
  }

  public function up() {
    if (isset($_SESSION['carrito']) && isset($_GET) && isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['carrito'][$index]['unidades']++;
      header("Location:".base_url."carrito/index");
    }
  }

  public function down() {
    if (isset($_SESSION['carrito']) && isset($_GET) && isset($_GET['index'])) {
      $index = $_GET['index'];
      $_SESSION['carrito'][$index]['unidades']--;

      if ($_SESSION['carrito'][$index]['unidades'] == 0) {
        unset($_SESSION['carrito'][$index]);
      }

      header("Location:".base_url."carrito/index");
    }
  }
}