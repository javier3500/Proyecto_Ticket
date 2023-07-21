<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barra de Navegación</title>
  <!-- Agrega los enlaces a los archivos CSS de Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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
            <a class="nav-link" href="{{route('Table_users')}}">Administración de usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tickets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('Create_tickets')}}">Nuevos Tickets</a>
          </li>
        </ul>
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
