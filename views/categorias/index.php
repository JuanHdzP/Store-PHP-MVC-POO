<h1>Gestionar categorias</h1>
<a href="<?= base_url ?>/categoria/crear" class="button button-small">Crear categoria</a>
<?php if (isset($_SESSION['catCreada']) && ($_SESSION['catCreada'] == 'complete')) : ?>
    <strong class="alert_green">Categoria creada correctamente</strong>
<?php elseif (isset($_SESSION['catCreada']) && ($_SESSION['catCreada'] == 'failed')) : ?>
    <strong class="alert_red">Creación fallida</strong>
<?php endif; ?>

<?php Utils::deleteSession('catCreada'); ?>
<table border="1">
    <tr>
        <th> # </th>
        <th> Nombre </th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td> <?= $cat->id ?> </td>
            <td> <?= $cat->nombre ?> </td>
        </tr>
    <?php endwhile; ?>
</table>