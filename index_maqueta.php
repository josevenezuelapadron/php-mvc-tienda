<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./assets/css/styles.css">
    <title>Tienda de ropa</title>
  </head>
  <body>
    <!-- CABECERA -->
    <header id="header">
      <div id="logo">
        <img src="./assets/img/camiseta.png" alt="Camiseta logo">
        <a href="index.php">Tienda de camiseta</a>
      </div>
    </header>

    <!-- MENU -->
    <nav id="menu">
      <ul>
        <li>
          <a href="">Inicio</a>
        </li>

        <li>
          <a href="">Categoria 1</a>
        </li>

        <li>
          <a href="">Categoria 2</a>
        </li>

        <li>
          <a href="">Categoria 3</a>
        </li>
      </ul>
    </nav>

    <div id="content">
      <!-- BARRA LATERAL -->
      <aside id="lateral">
        <div id="login" class="block_aside">
          <form action="#" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email">

            <label for="password">Contraseña:</label>
            <input type="password" name="password">

            <input type="submit" value="Enviar">
          </form>

          <ul>
            <li><a href="#">Mis pedidos</a></li>
            <li><a href="#">Gestionar pedidos</a></li>
            <li><a href="#">Gestionar categorias</a></li>
          </ul>
        </div>
      </aside>

      <!-- CONTENIDO CENTRAL -->
      <div id="central">
        <div class="product">
          <img src="./assets/img/camiseta.png" alt="Camiseta">
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="#" class="button">Comprar</a>
        </div>

        <div class="product">
          <img src="./assets/img/camiseta.png" alt="Camiseta">
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="#" class="button">Comprar</a>
        </div>

        <div class="product">
          <img src="./assets/img/camiseta.png" alt="Camiseta">
          <h2>Camiseta azul ancha</h2>
          <p>30 euros</p>
          <a href="#" class="button">Comprar</a>
        </div>
      </div>
    </div>

    <!-- PIE DE PAGINA -->
    <footer id="footer">
      <p>Desarrollado por José Padrón <?=date("Y")?> &copy;</p>
    </footer>
  </body>
</html>
