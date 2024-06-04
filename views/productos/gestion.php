<h1>Gestion de productos</h1>

<a href="<?= base_url ?>/producto/crear" class="button button-small">Crear producto</a>
<?php if (isset($_SESSION['producto']) && ($_SESSION['producto']) == "complete") : ?>
    <strong class="alert_green">Producto creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && ($_SESSION['producto']) == "failed") : ?>
    <strong class="alert_green">El producto no se ha creado correctamente</strong>
<?php endif; ?>

<?php if (isset($_SESSION['delete']) && (isset($_SESSION['delete']) == "complete")) : ?>
    <strong class="alert_green">Producto eliminado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && (isset($_SESSION['delete']) == "failed")) : ?>
    <strong class="alert_green">El producto no se pudo eliminar</strong>
<?php endif; ?>

<?php Utils::deleteSession('producto'); ?>
<?php Utils::deleteSession('delete'); ?>
<table border="1">
    <tr>
        <th> # </th>
        <th> Nombre </th>
        <th> Precio </th>
        <th> Stock </th>
        <th> Acciones </th>
    </tr>
    <?php while ($prod = $productos->fetch_object()) : ?>
        <tr>
            <td> <?= $prod->id ?> </td>
            <td> <?= $prod->nombre ?> </td>
            <td> <?= $prod->precio ?> </td>
            <td> <?= $prod->stock ?> </td>
            <td>
                <a href="<?= base_url ?>producto/eliminar&id=<?= $prod->id ?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?= base_url ?>producto/editar&id=<?= $prod->id ?>" class="button button-gestion">Editar</a>

            </td>
        </tr>
    <?php endwhile; ?>
</table>