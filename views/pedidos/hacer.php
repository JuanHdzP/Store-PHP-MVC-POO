<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Hacer pedido</h1>
    <p>
        <a href="<?= base_url ?>carrito/index">Volver al carrito</a>
    </p>
    <br>
    <h3>Direccion de envio</h3>
    <form action="<?= base_url ?>pedido/add" method="post">
        <label for="municipio">Municipio</label>
        <input type="text" name="provincia" id="minicipio" required>
        <label for="ciudad">Ciudad</label>
        <input type="text" name="ciudad" id="ciudad" required>
        <label for="direccion">Dirección</label>
        <input type="text" name="direccion" id="direccion" required>
        <input type="submit" value="Confirmar pedido">
    </form>
<?php else : ?>
    <h1>No estas autenticado</h1>
    <p>Necesitas iniciar sesion para poder realizar un pedido</p>
<?php endif; ?>