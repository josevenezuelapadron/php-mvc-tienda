<?php

class Database {
  public static function connect() {
    $db = new mysqli("localhost", "darioxlz", "141099", "tienda_master");
    $db->query("SET NAMES 'utf8'");

    return $db;
  }
}
