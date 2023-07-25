<?php

namespace App\Http\Controllers;

use App\Models\ticket;
use Illuminate\Http\Request;
use Carbon\Carbon;
$fechaActual = Carbon::now()->toDateString();
class TicketController extends Controller
{
    public function Input_Ticket(Request $req){
        //$datos = ticket::all();
        $insert = new ticket();
        $folio=$req->input('folio');
        $departamentosReportan=$req->input('departamentosReportan');
        $departamentosAtencion=$req->input('departamentosAtencion');
        $prioridad=$req->input('prioridad');
        $descripcion=$req->input('descripcion');
        $evidencia=$req->file('evidencia');
        $usuarioAtencion=$req->input('usuarioAtencion');
        $fechaActual = Carbon::now()->toDateString();
        //$this-> prueba_mostrar($evidencia);
        //echo $folio ."||".$departamentosReportan ."||".$departamentosAtencion ."||".$prioridad ."||".$descripcion ;
        $insert -> folio =$folio;
        $insert -> departamentosReportan =$departamentosReportan;
        $insert -> departamentosAtencion =$departamentosAtencion;
        $insert -> prioridad =$prioridad;
        $insert -> descripcion =$descripcion;
        $insert -> evidencia =$evidencia;
        $insert -> usuarioAtencion =$usuarioAtencion;
       // $insert -> updated_at =$fechaActual;
        //$insert -> created_at =$fechaActual;
        $insert -> save();
        return redirect()->route('tickets');
    }
    
     public function prueba_mostrar($evidencia){
        if ($evidencia && $evidencia->isValid()) {
            // Obtener el nombre del archivo original
            $nombreArchivo = $evidencia->getClientOriginalName();
        
            // Obtener el tipo MIME del archivo
            $tipoMime = $evidencia->getMimeType();
        
            // Verificar si el tipo MIME es un archivo PDF
            if ($tipoMime === 'application/pdf') {
                // Leer el contenido del archivo
                $contenidoArchivo = file_get_contents($evidencia->getRealPath());
        
                // Mostrar el nombre del archivo
                echo "Nombre del archivo: " . $nombreArchivo . "<br>";
        
                // Mostrar el PDF utilizando la etiqueta <embed>
                echo "<embed src='data:application/pdf;base64," . base64_encode($contenidoArchivo) . "' width='800' height='600' type='application/pdf'>";
            } else {
                echo "El archivo seleccionado no es un PDF.";
            }
        } else {
            echo "No se ha seleccionado un archivo válido.";
        }
    }
}
