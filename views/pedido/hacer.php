<?php if (isset($_SESSION['identity'])): ?>
	<h1>Hacer pedido</h1>
	<p><a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a></p><br>

	<form action="<?=base_url?>pedido/add" method="POST">
		<h3>Direccion para el envio</h3>

		<label for="provincia">Provincia:</label>
		<input type="text" name="provincia" required>

		<label for="ciudad">Ciudad:</label>
		<input type="text" name="ciudad" required>

		<label for="direccion">Direccion:</label>
		<input type="text" name="direccion" required>

		<input type="submit" value="Confirmar pedido">
	</form>
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para realizar tu pedido</p>
<?php endif; ?>