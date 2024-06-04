<h1>Registrarse</h1>
<!-- Sin rutas amigables -->
<!-- <form action="index.php?controller=Usuario&action=save" method="post"> -->

<?php if (isset($_SESSION['register']) && ($_SESSION['register'] == 'complete')) : ?>
    <strong class="alert_green">Usuario registrado correctamente</strong>
<?php elseif (isset($_SESSION['register']) && ($_SESSION['register'] == 'failed')) : ?>
    <strong class="alert_red">Registro fallido</strong>
<?php endif; ?>

<?php Utils::deleteSession('register'); ?>

<!-- Con rutas amigables -->
<form action="<?= base_url ?>usuario/save" method="post">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" required>
    <label for="apellidos">Apellido</label>
    <input type="text" name="apellidos" id="apellidos" required>
    <label for="email">Emai</label>
    <input type="email" name="email" id="email" required>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password" required>
    <input type="submit" value="Registrarse">
</form>