<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\View_users_table;
use Carbon\Carbon;
class ViewUsersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function view_table_date()
    {
        $datos = User::all();
      // return view('users',compact('datos'));
      return view('View_users/Table_users',compact('datos'));
       // return redirect()->route('table_users',compact('datos'));
    }
    public function update(Request $req)
    {
        $id=$req->input('ID');
        $up = User::find($id);
        $fechaActual = Carbon::now()->toDateString();
        
        $up->roles = $req->input('newRol');
        $up->date_modification =  $fechaActual;
        $up->save(); // Guardar los cambios en la base de datos
        $datos = User::all();
        return view('View_users/Table_users',compact('datos'));
        
        // Redireccionar o devolver una respuesta si es necesario
    }

   
}
