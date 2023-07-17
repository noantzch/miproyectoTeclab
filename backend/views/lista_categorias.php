
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Lista de Categorías</title>
  <link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
</head>
<body>
  <h1>Lista de Categorías</h1>
  <div class="categorias">
    <?php
    require_once '../../class/database.php';
    require_once '../../class/categorias.php';

    // Crear una instancia del objeto Database
    $db = new Database();

    // Obtener todas las categorías desde la base de datos
    $categorias = $db->select('categorias');

    // Mostrar el listado de categorías
    foreach ($categorias as $categoria) {
        if (isset($categoria['nombre'])) {
            echo "<p>{$categoria['nombre']}</p>";
        }
    }
    ?>
  </div>
  <p class="centered">Luis Noel Antezana</p>
  <a href="/MIPROYECTO/backend/views/categorias.html" class="btncentro">Agregar CATEGORIAS</a><br>
  <a href="/MIPROYECTO/index.php" class="btncentro">Volver</a> <br>
</body>
</html>
