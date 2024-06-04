<?php if (isset($prod)) : ?>
    <h1> <?= $prod->nombre ?> </h1>

    <div id="detail-product">
        <div class="image">
            <?php if ($prod->imagen) : ?>
                <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="Producto">
            <?php else : ?>
                <img src="<?= base_url ?>assets/img/camiseta.png"" alt=" Producto">
            <?php endif; ?>
        </div>
        <div class="data">
            <p class="description"> <?= $prod->descripcion ?> </p>
            <p class="price"> $<?= $prod->precio ?> </p>
            <a href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>" class="button">Comprar</a>
        </div>
    </div>
<?php else : ?>
    <h1>Ese producto no existe</h1>
<?php endif; ?>