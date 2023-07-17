$(document).ready(function() {
    $("form").submit(function(event) {
      var fields = ["producto_id", "producto_nombre", "producto_descripcion", "producto_precio", "producto_categoria"];
      var emptyFields = [];
  
      fields.forEach(function(field) {
        var value = $("#" + field).val().trim();
        if (value === "") {
          emptyFields.push(field);
        }
      });
  
      if (emptyFields.length > 0) {
        var errorMessage = "Los siguientes campos están vacíos:\n" + emptyFields.join("\n");
        alert(errorMessage + "\n\nLuis Noel Antezana");
        event.preventDefault();
      }
    });
  });
  
  function validarCamposCategorias() {
    var nombreCategoria = $('#nombre-categoria').val();
  
    if (nombreCategoria.trim() === '') {
      alert('El campo Nombre de Categoría está vacío.\n\nLuis Noel Antezana');
    } else {
      $('#formulario-categorias').unbind('submit').submit();
    }
  }
  
  function validarCamposProductos() {
    var nombreProducto = $('#nombre-producto').val();
    var descripcionProducto = $('#descripcion-producto').val();
  
    if (nombreProducto.trim() === '' || descripcionProducto.trim() === '') {
      var camposInvalidos = '';
      if (nombreProducto.trim() === '') {
        camposInvalidos += 'Nombre de Producto\n';
      }
      if (descripcionProducto.trim() === '') {
        camposInvalidos += 'Descripción de Producto\n';
      }
      alert('Los siguientes campos están vacíos:\n\n' + camposInvalidos + '\nLuis Noel Antezana');
    } else {
      $('#formulario-productos').unbind('submit').submit();
    }
  }
  