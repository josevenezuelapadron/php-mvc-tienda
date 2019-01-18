<h1>Crear nuevos productos</h1>
<div class="form_container">
  <form action="<?=base_url?>producto/save" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre: </label>
    <input type="text" name="nombre" required>

    <label for="categoria">Categoria: </label>
    <select name="categoria_id">
      <?php $categorias = Utils::showCategorias(); ?>
      <?php while($cat = $categorias->fetch_object()): ?>
        <option value="<?=$cat->id?>">
          <?=$cat->nombre?>
        </option>
      <?php endwhile; ?>
    </select>

    <label for="descripcion">Descripcion: </label>
    <textarea name="descripcion"></textarea>

    <label for="precio">Precio: </label>
    <input type="text" name="precio" value="1" min="0" required>

    <label for="stock">Stock: </label>
    <input type="number" name="stock" value="0" min="0" required>

    <!-- <label for="oferta">Oferta: </label>
    <input type="text" name="oferta"> -->

    <label for="imagen">Imagen: </label>
    <input type="file" name="imagen">

    <input type="submit" value="Guardar">
  </form>
</div>