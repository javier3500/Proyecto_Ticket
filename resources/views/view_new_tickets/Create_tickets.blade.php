    @extends('Main/Main')
    @section('title', 'Título de la página')
    @section('content')
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Formulario de Reporte</title>
      <!-- Enlace al archivo de estilos de Bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
      <div class="container mt-4">
        <h1>Formulario de Reporte</h1>
        <form action="#" method="post" enctype="multipart/form-data" novalidate>
    
          <!-- Campo: Generador de Folios Aleatorios (Solo de lectura) -->
          <div class="form-group">
            <label for="folio">Generador de Folios Aleatorios:</label>
            <input type="text" class="form-control" id="folio" readonly>
          </div>
    
          <!-- Campo: Departamentos que reportan el problema (Selección múltiple) -->
          <div class="form-group">
            <label for="departamentosReportan">Departamentos que reportan el problema:</label>
            <select class="form-control" id="departamentosReportan" name="departamentosReportan" required multiple>
              <option value="Recursos Humanos">Recursos Humanos</option>
              <option value="Área de TIC">Área de TIC</option>
              <option value="Dirección">Dirección</option>
            </select>
          </div>
    
          <!-- Campo: Departamentos de atención al problema (Selección múltiple) -->
          <div class="form-group">
            <label for="departamentosAtencion">Departamentos de atención al problema:</label>
            <select class="form-control" id="departamentosAtencion" name="departamentosAtencion" required multiple>
              <option value="Recursos Humanos">Recursos Humanos</option>
              <option value="Área de TIC">Área de TIC</option>
              <option value="Dirección">Dirección</option>
            </select>
          </div>
    
          <!-- Campo: Nivel de Prioridad (Radio buttons) -->
          <div class="form-group">
            <label for="prioridad">Nivel de Prioridad:</label>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="prioridad" id="prioridad1" value="Alta" required>
              <label class="form-check-label" for="prioridad1">Alta</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="prioridad" id="prioridad2" value="Media" required>
              <label class="form-check-label" for="prioridad2">Media</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="prioridad" id="prioridad3" value="Baja" required>
              <label class="form-check-label" for="prioridad3">Baja</label>
            </div>
          </div>
    
          <!-- Campo: Descripción del Reporte (Textarea) -->
          <div class="form-group">
            <label for="descripcion">Descripción del Reporte:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="5" required></textarea>
          </div>
    
          <!-- Campo: Evidencia (Carga de archivos - Solo PDF) -->
          <div class="form-group">
            <label for="evidencia">Evidencia (Solo PDF):</label>
            <input type="file" class="form-control-file" id="evidencia" name="evidencia" accept=".pdf" required>
          </div>
    
          <!-- Campo: Usuario de Atención -->
          <div class="form-group">
            <label for="usuarioAtencion">Usuario de Atención:</label>
            <input type="text" class="form-control" id="usuarioAtencion" name="usuarioAtencion" required>
          </div>
    
          <!-- Botón para enviar el formulario -->
          <button type="submit" class="btn btn-primary">Enviar Reporte</button>
    
        </form>
      </div>
    
      <!-- Enlace al archivo de scripts de Bootstrap y jQuery (necesario para algunas funcionalidades) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


      <script>
       // Función para generar el folio aleatorio
    function generarFolio() {
      var caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      var longitudFolio = 10; // Puedes ajustar la longitud del folio aquí
      var folio = "";

      for (var i = 0; i < longitudFolio; i++) {
        var indiceAleatorio = Math.floor(Math.random() * caracteres.length);
        folio += caracteres.charAt(indiceAleatorio);
      }

      document.getElementById("folio").value = folio;
    }

    // Generar folio automáticamente al cargar la página
    window.onload = function() {
      generarFolio();
    };
      </script>
    </body>
    </html>

    @endsection
