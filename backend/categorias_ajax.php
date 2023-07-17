<?php
require_once 'class/database.php';
require_once 'class/categorias.php';

// Crear una instancia del objeto Database
$db = new Database();

// Obtener todas las categorías desde la base de datos
$categorias = $db->select('categorias');

// Crear un array con los nombres de las categorías
$categoriasArray = array();
foreach ($categorias as $categoria) {
    if (isset($categoria['nombre'])) {
        $categoriasArray[] = $categoria['nombre'];
    }
}

// Devolver el array de categorías como una respuesta JSON válida
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    header('Content-Type: application/json');
    echo json_encode($categoriasArray);
    exit();
}
