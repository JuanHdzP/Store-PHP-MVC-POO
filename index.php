<?php
session_start();
require_once 'autoload.php';
require_once 'config/parameters.php';
require_once 'config/db.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';

function showError()
{
    $error = new ErrorController();
    $error->index();
}

// var_dump($_GET);

if (isset($_GET['controller'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
} elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
} else {
    // echo "La pagina que buscas no existe";
    showError();
    exit();
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (isset($_GET['action']) && method_exists($controlador, $_GET['action'])) {
        $action = $_GET['action'];
        $controlador->$action();
    } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $action_default = action_default;
        $controlador->$action_default();
    } else {
        // echo "La pagina que buscas no existe";
        showError();
    }
} else {
    // echo "La pagina que buscas no existe";
    showError();
}
require_once 'views/layout/footer.php';
