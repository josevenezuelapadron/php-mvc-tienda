<?php if (isset($pro)): ?>
  <h1><?=$pro->nombre?></h1>

  <div id="detail-product">
    <div class="image">
      <?php if($pro->imagen != null): ?>
        <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="<?=$pro->nombre?>">
      <?php else: ?>
        <img src="<?=base_url?>assets/img/camiseta.png" alt="logo por defecto">
      <?php endif; ?>
    </div> 
    
    <div class="data">
      <p class="description"><?=$pro->descripcion?></p>
      <p class="price"><?=$pro->precio?> euros</p>
      <a href="#" class="button">Comprar</a>
    </div>
  </div>
<?php else: ?>
  <h2>El producto no existe</h2>
<?php endif; ?>