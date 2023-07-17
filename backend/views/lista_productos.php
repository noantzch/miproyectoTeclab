<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista de Productos</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
</head>
<body>
  <h1>Lista de Productos</h1>
  <div class="productos">
    <?php
    require_once '../../class/database.php';
    require_once '../../class/productos.php';

    // Crear una instancia del objeto Database
    $db = new Database();

    // Obtener todos los productos desde la base de datos
    $productos = $db->select('productos');

    // Mostrar el listado de productos
    foreach ($productos as $producto) {
        if (isset($producto['nombre'])) {
            echo "<div class='producto'>";
            echo "<hr></hr>";
            echo "<p>Nombre: {$producto['nombre']}</p>";
            echo "<p>Precio: {$producto['precio']}</p>";
            echo "<p>Descripción: {$producto['descripcion']}</p>";
            echo "<hr></hr>";
            echo "</div>";
        }
    }
    ?>
  </div>
  <p class="centered">Luis Noel Antezana</p>
  <a href="/MIPROYECTO/backend/views/productos.php" class="btncentro">Agregar PRODUCTOS</a><br>
  <a href="/MIPROYECTO/index.php" class="btncentro">Volver</a> <br>
</body>
</html>
