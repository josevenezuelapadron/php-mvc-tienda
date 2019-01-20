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

        if ($save) {
          $_SESSION['pedido'] = "complete";
        } else {
          $_SESSION['pedido'] = "failed";
        }
      } else {
        $_SESSION['pedido'] = "failed";
      }

    } else {
      header("Location:".base_url);
    }
  }
}