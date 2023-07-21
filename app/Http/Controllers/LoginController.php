<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use App\Models\login;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class LoginController extends Controller
{

    public function inicio (Request $req){
        return view('welcome');
    }
  public function Ingresar(Request $req){
        //echo "hola mundo";
        $nombre = $req-> username;
        $PASSWORD = $req-> PASSWORD;
        echo $nombre."///".$PASSWORD;
        return redirect()->route('Main');;
        
       // return $req-> input();

  }
}
