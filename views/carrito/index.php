<h1>Carrito de la compra</h1>

<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1): ?>

<table>
  <tr>
    <th>Imagen</th>
    <th>Nombre</th>
    <th>Precio</th>
    <th>Unidades</th>
	  <th>Eliminar</th>
  </tr>
  <?php
    foreach($carrito as $indice => $elemento):
    $producto = $elemento['producto'];
  ?>
    <tr>
      <td>
        <?php if($producto->imagen != null): ?>
          <img class="img_carrito" src="<?=base_url?>uploads/images/<?=$producto->imagen?>" alt="<?=$producto->nombre?>">
        <?php else: ?>
          <img class="img_carrito" src="<?=base_url?>assets/img/camiseta.png" alt="logo por defecto">
        <?php endif; ?>
      </td>

      <td>
        <a href="<?=base_url?>producto/ver&id=<?=$producto->id?>"><?=$producto->nombre?></a>
      </td>

      <td>
        <?=$producto->precio?>
      </td>

      <td>
        <?=$elemento['unidades']?>
      </td>

	    <td>
		    <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Quitar producto</a>
	    </td>
    </tr>
  <?php endforeach; ?>
</table>
<br>

<div class="delete-carrito">
	<a href="<?=base_url?>carrito/deleteAll" class="button button-delete button-red">Vaciar carrito</a>
</div>

<?php $stats = Utils::statsCarrito(); ?>
<div class="total-carrito">
  <h3>Precio total: <?=$stats['total']?> $</h3>

  <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>
<?php else: ?>
	<h3>El carrito está vacio, añade algun producto</h3>
<?php endif; ?>