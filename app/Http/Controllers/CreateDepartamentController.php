<?php

namespace App\Http\Controllers;

use App\Models\create_departament;
use Illuminate\Http\Request;
class CreateDepartamentController extends Controller
{
    public function view_departament(Request $req)
    {
        $datos = create_departament::all();
        return view('view_departament/departamen',compact('datos'));
    }
    public function insert_departament(Request $req)
    {
       $insert = new create_departament();
       $departamento =$req->input('nombreDepartamentoEditar');
       $estado =$req->input('estadoDepartamento');
       $insert -> departamento =$departamento;
       $insert -> estado =$estado;
       $insert->save();
       $datos = create_departament::all();
        return view('view_departament/departamen',compact('datos'));
       
      
    }

    public function update_departament(Request $req)
    {
        $id=$req->input('ID_editar');
        $up = create_departament::find($id);
        $up->departamento = $req->input('Departamento_editar');
        $up->estado = $req->input('Estado_editar');
        $up->save(); // Guardar los cambios en la base de datos
        $datos = create_departament::all();
        return view('view_departament/departamen',compact('datos'));
    }

}
