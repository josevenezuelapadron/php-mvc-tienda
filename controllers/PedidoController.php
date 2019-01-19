<?php

class pedidoController {
  public function hacer() {
    require_once "views/pedido/hacer.php";
  }

  public function add() {
    var_dump($_POST);
  }
}