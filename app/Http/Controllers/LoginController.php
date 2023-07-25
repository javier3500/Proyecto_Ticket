<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\login;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class LoginController extends Controller
{

    public function inicio (Request $req){
      return view('welcome');
    }
    public function Ingresar(Request $req){
      $datos = User::all();
      $nombre = $req->username;
      $user_password = $req->PASSWORD;
      return redirect()->route('View_Inicio', compact('datos'));
  }
}
