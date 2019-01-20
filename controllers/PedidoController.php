<?php

require_once "models/pedido.php";

class pedidoController {
  public function hacer() {
    require_once "views/pedido/hacer.php";
  }

  public function add() {
    if (isset($_SESSION['identity'])) {
      $usuario_id = isset($_SESSION['identity']) ? $_SESSION['identity']->id : false;

      $provincia = isset($_POST['provincia']) ? trim($_POST['provincia']) : false;

      $localidad = isset($_POST['localidad']) ? trim($_POST['localidad']) : false;

      $direccion = isset($_POST['direccion']) ? trim($_POST['direccion']) : false;

      $stats = Utils::statsCarrito();
      $coste = $stats['total'];

      if ($usuario_id && $provincia && $localidad && $direccion && $coste) {
        $pedido = new Pedido();
        $pedido->setUsuario_id($usuario_id);
        $pedido->setProvincia($provincia);
        $pedido->setLocalidad($localidad);
        $pedido->setDireccion($direccion);
        $pedido->setCoste($coste);

        $save = $pedido->save();

        // Guardar linea pedido
        $save_linea = $pedido->save_linea();

        if ($save && $save_linea) {
          $_SESSION['pedido'] = "complete";
        } else {
          $_SESSION['pedido'] = "failed";
        }
      } else {
        $_SESSION['pedido'] = "failed";
      }

      header("Location:".base_url."pedido/confirmado");

    } else {
      header("Location:".base_url);
    }
  }

  public function confirmado() {
    if (isset($_SESSION['identity'])) {
      $identity = $_SESSION['identity'];
      $pedido = new Pedido();
      $pedido->setUsuario_id($identity->id);

      $pedido = $pedido->getOneByUser();

      $pedido_productos = new Pedido();
      $productos = $pedido_productos->getProductsByPedido($pedido->id);
    }

    require_once "views/pedido/confirmado.php";
  }

  public function mis_pedidos() {
    Utils::isIdentity();

    $usuario_id = $_SESSION['identity']->id;
    $pedido = new Pedido();

    // Sacar los pedidos de usuario
    $pedido->setUsuario_id($usuario_id);
    $pedidos = $pedido->getAllByUser();

    require_once "views/pedido/mis_pedidos.php";
  }

  public function detalle() {
    Utils::isIdentity();

    if (isset($_GET['id'])) {
      $id = $_GET['id'];

      $pedido = new Pedido();
      $pedido->setId($id);

      $pedido = $pedido->getOne();

      $pedido_productos = new Pedido();
      $productos = $pedido_productos->getProductsByPedido($id);

      require_once "views/pedido/detalle.php";
    } else {
      header("Location:".base_url."pedido/mis_pedidos");
    }
  }

  public function gestion() {
    Utils::isAdmin();
    $gestion = true;

    $pedido = new Pedido();
    $pedidos = $pedido->getAll();

    require_once "views/pedido/mis_pedidos.php";
  }

  public function estado() {
    Utils::isAdmin();

    if (isset($_POST) && isset($_POST['pedido_id']) && isset($_POST['estado'])) {
      $pedido_id = $_POST['pedido_id'];
      $estado = $_POST['estado'];

      $pedido = new Pedido();
      $pedido->setId($pedido_id);
      $pedido->setEstado($estado);
      $pedido->updateOne();

      header("Location:".base_url."pedido/detalle&id=".$pedido->getId());
    } else {
      header("Location:".base_url);
    }
  }
}