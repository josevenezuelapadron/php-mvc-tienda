<?php if (isset($_SESSION['identity'])): ?>
	<h1>Hacer pedido</h1>
	<a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
<?php else: ?>
	<h1>Necesitas estar identificado</h1>
	<p>Necesitas estar logueado en la web para realizar tu pedido</p>
<?php endif; ?>
