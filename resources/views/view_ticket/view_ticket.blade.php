@extends('Main/Main')
@section('title', 'Título de la página')
@section('content')

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Reportes</title>
  <!-- Enlace al archivo de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h1>Tabla de Reportes</h1>

    <!-- Tabla de Reportes -->
    <table class="table table-bordered table-hover mt-3">
      <thead>
        <tr>
          <th>Folio</th>
          <th>Fecha de Alta</th>
          <th>Solicitante</th>
          <th>Descripción</th>
          <th>Área</th>
          <th>Estatus</th>
          <th>Asignado a</th>
          <th>Prioridad</th>
          <th>Ver Detalles</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datos as $item)
        @php
              $mostrar = 
              $item->folio ."||". $item->departamentosReportan ."||". $item->departamentosAtencion . "||".
              $item->prioridad ."||". $item->descripcion ."||".
              $item->usuarioAtencion ."||". $item->created_at ."||". $item->evidencia ."||";
              @endphp
            
        <tr>
          <td>{{$item->folio}}</td>
          <td>{{$item->created_at}}</td>
          <td>Juan Pérez</td>
          <td>{{$item->descripcion}}</td>
          <td>{{$item->departamentosReportan}}</td>
          <td>En proceso</td>
          <td>María Gómez</td>
          <td>{{$item->prioridad}}</td>
          <td>
            <button onclick="agregar('@php echo $mostrar; @endphp')" type="button" class="btn btn-primary" data-toggle="modal" data-target="#detallesModal" >
              Ver Detalles
            </button>
          </td>
        </tr>
        @endforeach
        <!-- Agregar más filas de ejemplo aquí -->
      </tbody>
    </table>
    
  </div>

<!-- Modal para ver detalles del reporte -->
<div class="modal fade" id="detallesModal" tabindex="-1" role="dialog" aria-labelledby="detallesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detallesModalLabel">Detalles del Reporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenido del formulario para ver detalles del reporte -->
        <form>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="folio">Folio:</label>
              <input type="text" class="form-control" id="folio" name="folio" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="fechaAlta">Fecha de Alta:</label>
              <input type="text" class="form-control" id="created_at" name="created_at" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="solicitante">Solicitante:</label>
              <input type="text" class="form-control" id="solicitante" name="solicitante" value= "Juan Pérez"readonly>
            </div>
          </div>
          <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" readonly></textarea>
          </div>
          <div class="form-row">
           
            <div class="form-group col-md-4">
              <label for="estatus">Estatus:</label>
              <input type="text" class="form-control" id="estatus" name="estatus" value="En proceso" readonly>
            </div>
            <div class="form-group col-md-4">
              <label for="asignadoA">Asignado a:</label>
              <input type="text" class="form-control" id="asignadoA" name="asignadoA" value="Oscar" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="prioridad">Prioridad:</label>
              <input type="text" class="form-control" id="prioridad" name="prioridad" readonly>
            </div>
            <div class="form-group col-md-6">
              <label for="archivoPDF">Archivo PDF:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="evidencia" name="evidencia" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="departamentosReportan">Departamentos que reportan el problema:</label>
            <input type="text" class="form-control" id="departamentosReportan" name="departamentosReportan" readonly>
          </div>
          <div class="form-group">
            <label for="departamentosAtencion">Departamentos de atención al problema:</label>
            <input type="text" class="form-control" id="departamentosAtencion" name="departamentosAtencion" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



  <!-- Enlace al archivo de scripts de Bootstrap y jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<script> 
  function agregar(dato){
    console.log(dato)
    valores = dato.split('||');
    $('#folio').val(valores[0]);
    $('#departamentosReportan').val(valores[1]);
    $('#departamentosAtencion').val(valores[2]);
    $('#prioridad').val(valores[3]);
    $('#descripcion').val(valores[4]);
    $('#usuarioAtencion').val(valores[5]);
    $('#created_at').val(valores[6]);
    $('#evidencia').val(valores[7]);
   }
   </script>


@endsection