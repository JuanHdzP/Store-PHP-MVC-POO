<?php if (isset($edit) && isset($prod) && is_object($prod)) : ?>
    <h1>Editar producto <?= $prod->nombre ?></h1>
    <?php $url_action = base_url . "producto/save&id=" . $prod->id ?>
<?php else : ?>
    <h1>Crear nuevo producto</h1>
    <?php $url_action = base_url . "producto/save"; ?>
<?php endif; ?>



<form action="<?= $url_action ?>" method="post" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" value="<?= (isset($prod) && is_object($prod)) ? $prod->nombre : "" ?>">
    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id="descripcion"><?= (isset($prod) && is_object($prod)) ? $prod->descripcion : "" ?></textarea>
    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio" value="<?= (isset($prod) && is_object($prod)) ? $prod->precio : "" ?>">
    <label for="stock">Stock</label>
    <input type="number" name="stock" id="stock" value="<?= (isset($prod) && is_object($prod)) ? $prod->stock : "" ?>">
    <label for="categoria">Categoria</label>
    <select name="categoria" id="categoria">
        <option value="">Seleccione una categoria...</option>
        <?php $categorias = Utils::showCategorias(); ?>
        <?php while ($cat = $categorias->fetch_object()) : ?>
            <option value="<?= $cat->id ?>" <?= (isset($prod) && is_object($prod) && $cat->id == $prod->categoria_id) ? "selected" : "" ?>>
                <?= $cat->nombre ?>
            </option>
        <?php endwhile; ?>
    </select>
    <label for="imagen">Imagen</label>
    <?php if (isset($prod) && is_object($prod) && !empty($prod->imagen)) : ?>
        <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" class="thumb">
        <br>
    <?php endif; ?>
    <input type="file" name="imagen" id="imagen">
    <input type="submit" value="Guardar">
</form>