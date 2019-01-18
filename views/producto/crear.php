<?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
  <h1>Editar producto: <b><?=$pro->nombre?></b></h1>
  <?php $url = base_url."producto/edit&id=".$pro->id; $btn = "Editar"; ?>
<?php else: ?>
  <h1>Crear nuevos productos</h1>
  <?php $url = base_url."producto/save"; $btn = "Crear"; ?>
<?php endif; ?>

<div class="form_container">
  <form action="<?=$url?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" required value="<?=isset($pro) && is_object($pro) ? $pro->nombre : ""; ?>">

    <label for="categoria">Categoria: </label>
    <select name="categoria_id">
      <?php $categorias = Utils::showCategorias(); ?>
      <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>" <?=isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? "selected" : ""; ?>>
          <?=$cat->nombre?>
        </option>
      <?php endwhile; ?>
    </select>

    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion" ><?=isset($pro) && is_object($pro) ? $pro->descripcion : ""; ?></textarea>

    <label for="precio">Precio: </label>
    <input type="number" name="precio" value="<?=isset($pro) && is_object($pro) ? $pro->precio : "0"; ?>" min="0" required>

    <label for="stock">Stock: </label>
    <input type="number" name="stock"  value="<?=isset($pro) && is_object($pro) ? $pro->stock : "0"; ?>" min="0" required>

    <!-- <label for="oferta">Oferta: </label>
    <input type="text" name="oferta" > -->

    <label for="imagen">Imagen: </label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen)): ?>
      <img src="<?=base_url?>uploads/images/<?=$pro->imagen?>">
    <?php else: ?>
      <input type="file" name="imagen">
    <?php endif; ?>

    <input type="submit" value="<?=$btn?>">
  </form>
</div>