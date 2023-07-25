<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra de Navegación</title>
  <!-- Agrega los enlaces a los archivos CSS de Bootstrap y Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    /* Estilos personalizados para el botón de cerrar sesión */
    .navbar-nav .nav-item .nav-link {
      padding-right: 1rem;
      position: relative;
    }

    .navbar-nav .nav-item .nav-link .logout-icon {
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      margin-right: 5px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{route('View_Inicio')}}">Inicio</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('datos_table')}}">Administración de usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('view_ticket')}}">Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('tickets')}}">Nuevos Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('view_departament')}}">Departamento</a>
          </li>
        </ul>
        
        <a href="{{route('Login.inicio')}}" class="nav-link">
          <i class="fas fa-sign-out-alt logout-icon"></i>
          Cerrar Sesión
        </a>
      </div>
    </div>
  </nav>

  <!-- Aquí puedes agregar el contenido del sitio web -->
  @yield('content')

  <!-- Agrega los enlaces a los archivos JavaScript de Bootstrap y jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
