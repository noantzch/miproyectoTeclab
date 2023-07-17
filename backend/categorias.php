<?php
require_once '../class/categorias.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nombre"])) {
        $categoria = new Categoria();
        $categoria->nombre = $_POST["nombre"];
        $guardadoExitoso = $categoria->guardar();

        if ($guardadoExitoso) {
            echo '<script>alert("Categoría guardada exitosamente");</script>';
            echo '<script>window.location.href = "/MIPROYECTO/index.php";</script>';
            exit();
        } else {
            // Manejo del error en caso de no poder guardar la categoría
        }
    }
}
?>
