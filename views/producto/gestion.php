<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
  <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
  <strong class="alert_red">El producto no se ha creado correctamente</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<table>
  <tr>
    <th>ID</th>
    <th>CATEGORIA_ID</th>
    <th>NOMBRE</th>
    <th>DESCRIPCION</th>
    <th>PRECIO</th>
    <th>STOCK</th>
    <!-- <th>OFERTA</th> -->
    <th>FECHA</th>
    <!-- <th>IMAGEN</th> -->
  </tr>
  <?php while($producto = $productos->fetch_object()): ?>
    <tr>
      <td><?= $producto->id; ?></td>
      <td><?= $producto->categoria_id; ?></td>
      <td><?= $producto->nombre; ?></td>
      <td><?= $producto->descripcion; ?></td>
      <td><?= $producto->precio; ?></td>
      <td><?= $producto->stock; ?></td>
      <!-- <td><?= $producto->oferta; ?></td> -->
      <td><?= $producto->fecha; ?></td>
      <!-- <td><?= $producto->imagen; ?></td> -->
    </tr>
  <?php endwhile; ?>
</table>