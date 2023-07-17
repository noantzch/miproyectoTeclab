<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Alta de Productos</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/estilos.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../../assets/js/validaciones.js"></script>
</head>
<body>
    <h1>Formulario de Alta de Productos</h1>
    <form enctype="multipart/form-data" action="../productos.php" method="POST" id="formulario-productos" onsubmit="validarCamposProductos()">

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen" accept="image/*">

        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion"></textarea>

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio">

        <label for="categoria_id">Categoría:</label>
        <select id="categoria_id" name="categoria_id">
            <?php
            require_once '../../class/database.php';
            require_once '../../class/categorias.php';

            // Crear una instancia del objeto Database
            $db = new Database();

            // Obtener todas las categorías desde la base de datos
            $categorias = $db->select('categorias');

            // Mostrar las categorías como opciones en el select
            foreach ($categorias as $categoria) {
                if (isset($categoria['id']) && isset($categoria['nombre'])) {
                    echo "<option value=\"{$categoria['id']}\">{$categoria['nombre']}</option>";
                }
            }
            
            ?>
        </select>

        <button type="button">Cancelar</button>
        <button type="submit">Guardar</button>
    </form>
    <p class="centered">Luis Noel Antezana</p>
    <a href="../../index.php" class="btncentro">Volver</a>
</body>
</html>
