<?php
function controllerAutoload($classname)
{
    include 'controllers/' . $classname . '.php';
}

spl_autoload_register('controllerAutoload');
