<h1>Mis pedidos</h1>

<table>
  <tr>
    <th>Nº pedido</th>
    <th>Coste</th>
    <th>Fecha</th>
    <th>Detalle</th>
  </tr>
  <?php
    while($ped = $pedidos->fetch_object()):
  ?>
    <tr>
      <td>
        <?=$ped->id?>
      </td>

      <td>
        <?=$ped->coste?> $
      </td>

      <td>
        <?=$ped->fecha?>
      </td>

      <td>
        <a href="<?=base_url?>pedido/detalle&id=<?=$ped->id?>" class="button button-carrito">Detalle</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>
