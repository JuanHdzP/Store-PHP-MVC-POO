<!-- Barra lateral -->
<aside id="lateral">
    <?php if (isset($_SESSION['carrito'])) : ?>
        <div id="carrito" class="block_aside">
            <h3>Mi carrito</h3>
            <ul>
                <?php $stats = Utils::statsCarrito(); ?>
                <li><a href="<?php echo base_url; ?>carrito/index">Productos ( <?= $stats['count']; ?> )</a></li>
                <li><a href="<?php echo base_url; ?>carrito/index">Total $<?= $stats['total']; ?></a></li>
                <li><a href="<?php echo base_url; ?>carrito/index">Ver mi carrito</a></li>
            </ul>
        </div>
    <?php endif; ?>
    <div id="login" class="block_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= base_url ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
                <input type="submit" value="Enviar">
            </form>
        <?php else : ?>
            <h3><?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellidos ?></h3>
        <?php endif; ?>

        <ul>
            <?php if (isset($_SESSION['admin'])) : ?>
                <li><a href="<?php echo base_url; ?>categoria/index">Gestionar categorías</a></li>
                <li><a href="<?php echo base_url; ?>producto/gestion">Gestionar productos</a></li>
                <li><a href="">Gestionar pedidos</a></li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])) : ?>
                <li><a href="">Mis pedidos</a></li>
                <li><a href="<?php echo base_url; ?>usuario/logout">Cerrar sesión</a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['identity'])) : ?>
                <li><a href="<?php echo base_url; ?>usuario/registro">Registrate aqui</a></li>
            <?php endif; ?>
        </ul>

    </div>
</aside>
<!-- Contenido -->
<div id="central">