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

}