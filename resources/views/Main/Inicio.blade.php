@extends('Main/Main')
@section('title', 'Título de la página')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla con Filtros</title>
  <!-- Enlace al archivo de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h1>Tabla con Filtros</h1>

    <!-- Filtros -->
    <div class="row mb-4">
      <div class="col">
        <input type="text" class="form-control" id="filtroFolio" placeholder="Filtrar por Folio">
      </div>
      <div class="col">
        <input type="text" class="form-control" id="filtroUsuario" placeholder="Filtrar por Usuario">
      </div>
      <div class="col">
        <input type="date" class="form-control" id="filtroFecha" placeholder="Filtrar por Fecha">
      </div>
    </div>
  
    <!-- Tabla con los datos -->
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Folio</th>
          <th>Usuario</th>
          <th>Fecha</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>12345</td>
          <td>Juan Perez</td>
          <td>2023-07-20</td>
          <td>Pendiente</td>
        </tr>
        <!-- Puedes agregar más filas de datos aquí -->
      </tbody>
    </table>
  </div>

  <!-- Enlace al archivo de scripts de Bootstrap y jQuery (necesario para los filtros) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Función para filtrar la tabla por Folio, Usuario y Fecha
    $(document).ready(function () {
      $("#filtroFolio").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#filtroUsuario").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("table tbody tr").filter(function () {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });

      $("#filtroFecha").on("change", function () {
        var value = $(this).val();
        $("table tbody tr").filter(function () {
          var fechaRegistro = $(this).find("td:eq(2)").text();
          $(this).toggle(fechaRegistro === value)
        });
      });
    });
  </script>
</body>
</html>
@endsection
