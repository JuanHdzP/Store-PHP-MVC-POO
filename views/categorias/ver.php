<?php if (isset($categoria)) : ?>
    <h1> <?= $categoria->nombre ?> </h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>Aun no hay productos asignados a esa categoria.</p>
    <?php else : ?>
        <?php while ($prod = $productos->fetch_object()) : ?>
            <div class="product">
                <a href="<?= base_url ?>producto/ver&id=<?= $prod->id ?>">
                    <?php if ($prod->imagen) : ?>
                        <img src="<?= base_url ?>uploads/images/<?= $prod->imagen ?>" alt="Producto">
                    <?php else : ?>
                        <img src="<?= base_url ?>assets/img/camiseta.png"" alt=" Producto">
                    <?php endif; ?>
                    <h2><?= $prod->nombre ?></h2>
                </a>
                <p> $<?= $prod->precio ?> </p>
                <a href="<?= base_url ?>carrito/add&id=<?= $prod->id ?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>Esa categoria no existe</h1>
<?php endif; ?>