<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>

<?php if(isset($_SESSION['producto']) && $_SESSION['producto'] == 'complete'): ?>
  <strong class="alert_green">El producto se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['producto']) && $_SESSION['producto'] != 'complete'): ?>
  <strong class="alert_red">El producto no se ha creado correctamente</strong>
<?php endif; ?>

<?php Utils::deleteSession('producto'); ?>

<?php if(isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
  <strong class="alert_green">El producto se ha borrado exitosamente</strong>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'): ?>
  <strong class="alert_red">El producto NO se ha borrado exitosamente</strong>
<?php endif; ?>

<?php Utils::deleteSession('delete'); ?>

<table>
  <tr>
    <th>ID</th>
    <!-- <th>CATEGORIA_ID</th> -->
    <th>NOMBRE</th>
    <!-- <th>DESCRIPCION</th> -->
    <th>PRECIO</th>
    <th>STOCK</th>
    <!-- <th>OFERTA</th> -->
    <!-- <th>FECHA</th> -->
    <th>IMAGEN</th>
    <th>ACCIONES</th>
  </tr>
  <?php while($producto = $productos->fetch_object()): ?>
    <tr>
      <td><?= $producto->id; ?></td>
      <!-- <td> $producto->categoria_id; ?></td> -->
      <td><?= $producto->nombre; ?></td>
      <!-- <td> $producto->descripcion; ?></td> -->
      <td><?= $producto->precio; ?></td>
      <td><?= $producto->stock; ?></td>
      <!-- <td>$producto->oferta; ?></td> -->
      <!-- <td> $producto->fecha; ?></td> -->
      <td><?= $producto->imagen; ?></td>
      <td>
        <a href="<?=base_url?>producto/editar&id=<?=$producto->id?>" class="button button-gestion">Editar</a>
        <a href="<?=base_url?>producto/eliminar&id=<?=$producto->id?>" class="button button-gestion button-red">Eliminar</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>