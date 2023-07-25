@extends('Main/Main')
@section('title', 'Título de la página')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tabla de Usuarios</title>
  <!-- Enlace al archivo de estilos de Bootstrap 4.5.2 -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <th>Fecha de Modificación</th>
          <th>Cambiar Rol</th> <!-- Nuevo campo para el botón de guardado -->
        </tr>
      </thead>
      
        @foreach ($datos as $item)
            
        <tr>
          <td>{{$item->user}}</td>
          @php
              $mostrar = $item->id ."||" . $item->roles . "||";
              @endphp
          <td>{{$item->user_password}}</td>
          <td>{{$item->roles}}</td>
          <td>{{$item->date_modification}}</td>
          <td>
        
            <button onclick="agregar('@php echo $mostrar; @endphp')" 
            type="button" class="btn btn-primary" data-toggle="modal" data-target="#miModal">
              <span class="bi bi-check"></span> Cambiar Rol
            </button>
          </td>
        </tr>
        @endforeach
        
    </table>
 
  </div>
 

<!-- Contenido del modal -->
<form action="{{ route('capturar') }}" method="POST">
  @csrf
  
  @method('PUT')
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Guardar Cambios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Deseas guardar los cambios?</p>
        <!-- Puedes agregar aquí cualquier contenido adicional que desees mostrar en el modal -->
        <input type="hidden" name="ID" value="ID" id = "ID">
        <select class="form-control" name="newRol" id="Roles">
          <option value="Administrador">Administrador</option>
          <option value="Programador">Programador</option>
          <option value="Soporte">Soporte</option>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
</form>


  <!-- Enlace al archivo de scripts de Bootstrap y jQuery (necesario para el filtro) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script> 
  function agregar(dato){
    console.log(dato)
    valores = dato.split('||');
    $('#ID').val(valores[0]);
    $('#Roles').val(valores[1]);
   
   }
   </script>
</body>
</html>



@endsection