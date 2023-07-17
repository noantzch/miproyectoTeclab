<?php

// Archivo de autocarga de clases
spl_autoload_register(function($class) {
    require_once 'class/' . $class . '.php';
});

/* @autor Luis Noel Antezana */
?>