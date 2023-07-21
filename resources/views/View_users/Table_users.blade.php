@extends('Main/Main')
@section('title', 'Título de la página')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Usuarios</title>
  <!-- Enlace al archivo de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Enlace a la biblioteca de Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0-alpha1@5.1.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-4">
    <h1>Tabla de Usuarios</h1>

    <!-- Filtro de Usuarios -->
    <div class="form-group">
      <label for="filtroUsuarios">Filtrar Usuarios:</label>
      <input type="text" class="form-control" id="filtroUsuarios" placeholder="Ingrese el nombre del usuario">
    </div>

    <!-- Tabla de Usuarios -->
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Usuario</th>
          <th>Password</th>
          <th>Rol</th>
          <th>Cambiar Rol</th>
          <th>Fecha de Modificación</th>
          <th>Guardar</th> <!-- Nuevo campo para el botón de guardado -->
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>JuanPerez</td>
          <td>********</td>
          <td>Usuario</td>
          <td>
            <select class="form-control" onchange="cambiarRol(this)">
              <option value="usuario">Usuario</option>
              <option value="administrador">Administrador</option>
              <option value="editor">Editor</option>
            </select>
          </td>
          <td></td> <!-- Este es el campo para la fecha de modificación -->
          <td>
            <button type="button" class="btn btn-primary" onclick="guardarCambios(this)">
              <span class="bi bi-check"></span> Guardar
            </button>
          </td>
        </tr>
        <!-- Puedes agregar más filas de usuarios aquí -->
      </tbody>
    </table>
  </div>

  <!-- Enlace al archivo de scripts de Bootstrap y jQuery (necesario para el filtro) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Función para filtrar usuarios
    $(document).ready(function () {
      $("#filtroUsuarios").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });

    // Función para cambiar el rol de usuario
    function cambiarRol(selectElement) {
      var nuevoRol = selectElement.value;
      var fechaModificacion = new Date().toLocaleString(); // Obtenemos la fecha actual
      var row = selectElement.parentNode.parentNode; // Obtenemos la fila actual

      // Actualizamos el valor del rol y la fecha de modificación en la tabla
      row.cells[2].innerText = nuevoRol;
      row.cells[4].innerText = fechaModificacion;

      // Aquí puedes realizar una llamada AJAX para guardar los cambios en la base de datos,
      // incluyendo la fecha de modificación, o realizar cualquier otra lógica necesaria.

      console.log("Nuevo rol seleccionado: " + nuevoRol);
      console.log("Fecha de modificación: " + fechaModificacion);
    }

    // Función para guardar los cambios en la tabla
    function guardarCambios(buttonElement) {
      var row = buttonElement.parentNode.parentNode; // Obtenemos la fila actual
      var usuario = row.cells[0].innerText;
      var password = row.cells[1].innerText;
      var rol = row.cells[2].innerText;
      var fechaModificacion = row.cells[4].innerText;

      // Aquí puedes realizar una llamada AJAX para enviar los datos al servidor y guardarlos en la base de datos.
      console.log("Usuario: " + usuario);
      console.log("Password: " + password);
      console.log("Rol: " + rol);
      console.log("Fecha de modificación: " + fechaModificacion);
    }
  </script>
</body>
</html>


@endsection