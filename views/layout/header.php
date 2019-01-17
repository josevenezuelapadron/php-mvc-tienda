<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
    <title>Tienda de ropa</title>
  </head>
  <body>
    <div id="container">
      <!-- CABECERA -->
      <header id="header">
        <div id="logo">
          <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta logo">
          <a href="<?=base_url?>">Tienda de camiseta</a>
        </div>
      </header>

      <!-- MENU -->
      <?php $categorias =  Utils::showCategorias(); ?>
      <nav id="menu">
        <ul>
          <li>
            <a href="<?=base_url?>">Inicio</a>
          </li>

          <?php while($cat = $categorias->fetch_object()): ?>
            <li>
              <a href="<?=base_url?>"><?=$cat->nombre?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </nav>

      <div id="content">