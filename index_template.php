<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div id="container">
        <!-- Cabecera -->
        <header id="header">
            <div id="logo">
                <img src="assets/img/camiseta.png" alt="Logo">
                <a href="index.php">Tienda</a>
            </div>
        </header>
        <!-- Menu -->
        <nav id="menu">
            <ul>
                <li><a href=""> Inicio</a></li>
                <li><a href=""> Categoria 1</a></li>
                <li><a href=""> Categoria 2</a></li>
                <li><a href=""> Categoria 3</a></li>
                <li><a href=""> Categoria 4</a></li>
                <li><a href=""> Categoria 5</a></li>
            </ul>
        </nav>

        <div id="content">

            <!-- Barra lateral -->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="" method="post">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password">
                        <input type="submit" value="Enviar">
                    </form>

                    <ul>
                        <li><a href="">Mis pedidos</a></li>
                        <li><a href="">Gestionar pedidos</a></li>
                        <li><a href="">Gestionar categorias</a></li>
                    </ul>

                </div>
            </aside>
            <!-- Contenido -->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/camiseta.png" alt="Producto">
                    <h2>Camiseta azul</h2>
                    <p>$350</p>
                    <a href="" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="Producto">
                    <h2>Camiseta azul</h2>
                    <p>$350</p>
                    <a href="" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="Producto">
                    <h2>Camiseta azul</h2>
                    <p>$350</p>
                    <a href="" class="button">Comprar</a>
                </div>

                <div class="product">
                    <img src="assets/img/camiseta.png" alt="Producto">
                    <h2>Camiseta azul</h2>
                    <p>$350</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <p>Creado por Juan Hernandez. <?= date('Y') ?> </p>
        </footer>
    </div>
</body>

</html>