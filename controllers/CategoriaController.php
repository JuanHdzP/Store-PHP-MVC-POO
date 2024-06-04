<?php
require_once 'models/categoria.php';
require_once 'models/producto.php';
class CategoriaController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        require_once 'views/categorias/index.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();

        if (isset($_POST) && isset($_POST['nombre'])) {
            // Guardar categoria en db
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $save = $categoria->save();

            if ($save) {
                $_SESSION['catCreada'] = "complete";
            } else {
                $_SESSION['catCreada'] = "failed";
            }
        } else {
            $_SESSION['catCreada'] = "failed";
        }

        header("Location:" . base_url . "categoria/index");
    }

    public function ver()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Conseguir categoria
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            // Consegrui productos
            $producto = new Producto();
            $producto->setCategoriaId($id);
            $productos = $producto->getByCategoria();
        }
        require_once 'views/categorias/ver.php';
    }
}
