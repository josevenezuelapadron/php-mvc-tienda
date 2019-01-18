<h1>Algunos de nuestros productos</h1>

<?php while($pro = $productos->fetch_object()): ?>
  <div class="product">
    <?php if($pro->imagen != null): ?>
      <img class="" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="<?=$pro->nombre?>">
    <?php else: ?>
      <img class="" src="assets/img/camiseta.png" alt="logo por defecto">
    <?php endif; ?>
    <h2><?=$pro->nombre?></h2>
    <p><?=$pro->precio?> euros</p>
    <a href="#" class="button">Comprar</a>
  </div>
<?php endwhile; ?>