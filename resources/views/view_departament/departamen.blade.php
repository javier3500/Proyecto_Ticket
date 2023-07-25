@extends('Main/Main')
@section('title', 'Título de la página')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Departamentos</title>
  <!-- Enlace al archivo de estilos de Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-4">
    <h1>Tabla de Departamentos</h1>

    <!-- Botón para agregar nuevo departamento -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoDepartamentoModal" >
      <span class="bi bi-plus"></span> Nuevo Departamento
    </button>

    <!-- Filtro de tabla por departamento -->
    <div class="form-group mt-3">
      <label for="filtroDepartamento">Filtrar por Departamento:</label>
      <input type="text" class="form-control" id="filtroDepartamento" onkeyup="filtrarTabla()" placeholder="Ingrese el nombre del departamento">
    </div>
   
    <!-- Tabla de Departamentos -->
    <table class="table table-bordered table-hover mt-3" id="tablaDepartamentos">
      
      <thead>
        <tr>
          <th>Departamento</th>
          <th>Estado</th>
          <th>Fecha de creacion</th>
          <th>Fecha de actualizacion</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($datos as $item)
        <tr>
          <td>{{$item->departamento}}</td>
          @php
              $mostrar = $item->id ."||" . $item->departamento . "||" . $item->estado . "||";
          @endphp
          <td>{{$item->estado}}</td>
          <td>{{$item->created_at}}</td>
          <td>{{$item->updated_at}}</td>
          <td>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editarDepartamentoModal" onclick="editar('@php echo $mostrar; @endphp')">
              <span class="bi bi-pencil" ></span> Editar
            </button>
          </td>
          <td>
          </td>
        </tr>
        @endforeach
        <!-- Agregar más filas de ejemplo aquí -->
      </tbody>
    </table>
  </div>

  <!-- Modal para agregar nuevo departamento -->
  <div class="modal fade" id="nuevoDepartamentoModal" tabindex="-1" role="dialog" aria-labelledby="nuevoDepartamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nuevoDepartamentoModalLabel">Nuevo Departamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del formulario para agregar nuevo departamento -->
          <form action="{{ route('insert_departament')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="nombreDepartamentoEditar">Nombre del Departamento:</label>
              <input type="text" class="form-control" id="nombreDepartamentoEditar"  name="nombreDepartamentoEditar"required>
            </div>

            <select class="form-control" id="estadoDepartamento" name="estadoDepartamento">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
            <!-- Agregar más campos del formulario aquí -->
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  <!-- Modal para editar departamento -->
  <div class="modal fade" id="editarDepartamentoModal" tabindex="-1" role="dialog" aria-labelledby="editarDepartamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarDepartamentoModalLabel">Editar Departamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Contenido del formulario para editar departamento -->
          <form action="{{ route('update_departament') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
              <input type="hidden" name="ID_editar" value="ID_editar" id = "ID_editar">
              <label for="nombreDepartamentoEditar">Nombre del Departamento:</label>
              <input type="text" class="form-control" id="Departamento_editar"  name="Departamento_editar"required>
            </div>

            <select class="form-control" id="Estado_editar" name="Estado_editar">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
            <!-- Agregar más campos del formulario aquí -->
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <!-- Enlace al archivo de scripts de Bootstrap y jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Función para filtrar la tabla por departamento
    function filtrarTabla() {
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("filtroDepartamento");
      filter = input.value.toUpperCase();
      table = document.getElementById("tablaDepartamentos");
      tr = table.getElementsByTagName("tr");

      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
  </script>

<script> 
  function editar(dato){
    console.log(dato)
    valores = dato.split('||');
    $('#ID_editar').val(valores[0]);
    $('#Departamento_editar').val(valores[1]);
    $('#Estado_editar').val(valores[2]);
   }
   </script>
</body>

</html>
@endsection
