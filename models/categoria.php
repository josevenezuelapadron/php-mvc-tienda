<?php

class Categoria {
  private $id;
  private $nombre;
  private $db;

  public function __construct() {
    $this->db = Database::connect();
  }

  function getId() {
    return $this->id;
  }

  function getNombre() {
    return $this->nombre;
  }

  function setId($id) {
    $this->id = $id;
  }

  function setNombre($nombre) {
    $this->nombre = trim($this->db->real_escape_string($nombre));
  }

  public function getCategorias() {
    $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id DESC;");

    return $categorias;
  }

  public function getOne() {
    $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()};");

    return $categoria->fetch_object();
  }

  public function save() {
    $sql = "INSERT INTO categorias VALUES(null, '{$this->getNombre()}');";
    $save = $this->db->query($sql);

    $result = false;

    if ($save) {
      $result = true;
    }

    return $result;
  }
}
