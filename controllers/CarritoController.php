<?php
require_once 'models/producto.php';
class CarritoController
{
    public function index()
    {
        $carrito = $_SESSION['carrito'];
        require_once 'views/carrito/index.php';
    }

    public function add()
    {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header('Location:' . base_url);
        }

        // Validar si existe el producto previamente agregado, para solo aumentar sus unidades
        if (isset($_SESSION['carrito']) && isset($_GET['id'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }

        // Si no existe el producto en el carrito buscarlo y agregarlo a la session
        if (!isset($counter) || $counter == 0) {
            // Conseguir Producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $producto = $producto->getOne();

            // Agregar producto a carrito
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    'id_producto' => $producto->id,
                    'precio' => $producto->precio,
                    'unidades' => 1,
                    'producto' => $producto,
                );
            }
        }
        header('Location:' . base_url . 'carrito/index');
    }
    public function remove()
    {
    }
    public function delete()
    {
    }
    public function deleteAll()
    {
        unset($_SESSION['carrito']);
    }
}
