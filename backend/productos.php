<?php
require_once '../class/productos.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["nombre"]) && isset($_POST["precio"]) && isset($_POST["categoria_id"]) && isset($_POST["descripcion"]) && isset($_FILES["imagen"])) {
        $producto = new Producto();
        $producto->nombre = $_POST["nombre"];
        $producto->precio = $_POST["precio"];
        $producto->categoria_id = $_POST["categoria_id"];
        $producto->descripcion = $_POST["descripcion"];

        $imagen = $_FILES["imagen"];
        $imagenNombre = $imagen["name"];
        $imagenTmp = $imagen["tmp_name"];
        $imagenRuta = "../assets/img/" . $imagenNombre;
        move_uploaded_file($imagenTmp, $imagenRuta);

        $producto->imagen = $imagenRuta;

        $guardadoExitoso = $producto->guardar();

        if ($guardadoExitoso) {
            echo '<script>alert("Producto guardado exitosamente");</script>';
            echo '<script>window.location.href = "/MIPROYECTO/index.php";</script>';
            exit();
        } else {
            echo '<script>alert("Error");</script>';
            echo '<script>window.location.href = "/MIPROYECTO/index.php";</script>';

        }
    }
}
?>
