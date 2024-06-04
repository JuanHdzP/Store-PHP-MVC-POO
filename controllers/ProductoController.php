<?php
require_once 'models/producto.php';
class ProductoController
{
    public function index()
    {
        $producto = new Producto();
        $productos = $producto->getRandom(6);
        require_once 'views/productos/destacados.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Producto();
        $productos = $producto->getAll();

        require_once 'views/productos/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/productos/crear.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
            $precio = isset($_POST['precio']) ? $_POST['precio'] : false;
            $stock = isset($_POST['stock']) ? $_POST['stock'] : false;
            $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false;
            // $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;

            if ($nombre && $descripcion && $precio && $stock && $categoria) {
                $producto = new Producto();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoriaId($categoria);

                // Guardar img
                if (isset($_FILES['imagen'])) {

                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype = $file['type'];

                    if ($mimetype == "image/jpg" || $mimetype == "image/jpeg" || $mimetype == "image/png" || $mimetype == "image/gif") {
                        if (!is_dir('uploads/images')) {
                            mkdir('uploads/images', 0777, true);
                        }
                        move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                        $producto->setImagen($filename);
                    }
                }

                if ($_GET['id']) {
                    // Editrar producto
                    $id = $_GET['id'];
                    $producto->setId($id);
                    $save = $producto->edit();
                } else {
                    // Guardar prod
                    $save = $producto->save();
                }

                if ($save) {
                    $_SESSION['producto'] = "complete";
                } else {
                    $_SESSION['producto'] = "failed";
                }
            } else {
                $_SESSION['producto'] = "failed";
            }
        } else {
            $_SESSION['producto'] = "failed";
        }
        header("Location:" . base_url . "producto/gestion");
    }

    public function editar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $edit = true;
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
            require_once 'views/productos/crear.php';
        } else {
            header("Location:" . base_url . "producto/gestion");
        }
    }

    public function eliminar()
    {
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $delete = $producto->delete();

            if ($delete) {
                $_SESSION['delete'] = "complete";
            } else {
                $_SESSION['delete'] = "failed";
            }
        } else {
            $_SESSION['delete'] = "failed";
        }
        header("Location:" . base_url . "producto/gestion");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Producto();
            $producto->setId($id);
            $prod = $producto->getOne();
        }
        require_once 'views/productos/ver.php';
    }
}
