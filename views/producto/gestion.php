<h1>Gestión de productos</h1>

<a href="<?=base_url?>producto/crear" class="button button-small">Crear producto</a>

<table>
  <tr>
    <th>ID</th>
    <th>CATEGORIA_ID</th>
    <th>NOMBRE</th>
    <th>DESCRIPCION</th>
    <th>PRECIO</th>
    <th>STOCK</th>
    <th>OFERTA</th>
    <th>FECHA</th>
    <th>IMAGEN</th>
  </tr>
  <?php while($producto = $productos->fetch_object()): ?>
    <tr>
      <td><?= $producto->id; ?></td>
      <td><?= $producto->categoria_id; ?></td>
      <td><?= $producto->nombre; ?></td>
      <td><?= $producto->descripcion; ?></td>
      <td><?= $producto->precio; ?></td>
      <td><?= $producto->stock; ?></td>
      <td><?= $producto->oferta; ?></td>
      <td><?= $producto->fecha; ?></td>
      <td><?= $producto->imagen; ?></td>
    </tr>
  <?php endwhile; ?>
</table>