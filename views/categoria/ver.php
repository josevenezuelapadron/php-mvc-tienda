<?php if (isset($categoria)): ?>
  <h1><?=$categoria->nombre?></h1>
  <?php if ($productos->num_rows == 0): ?>
    <p>No hay productos para mostrar</p>
  <?php else: ?>
    <?php while($pro = $productos->fetch_object()): ?>
      <div class="product">
        <?php if($pro->imagen != null): ?>
          <img class="" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="<?=$pro->nombre?>">
        <?php else: ?>
          <img class="" src="<?=base_url?>assets/img/camiseta.png" alt="logo por defecto">
        <?php endif; ?>
        <h2><?=$pro->nombre?></h2>
        <p><?=$pro->precio?> euros</p>
        <a href="#" class="button">Comprar</a>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
<?php else: ?>
  <h2>La categoria no existe</h2>
<?php endif; ?>