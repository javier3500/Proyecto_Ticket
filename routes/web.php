<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [LoginController::class,'inicio'])->name('Login.inicio');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/ingresar', [LoginController::class,'Ingresar'])->name('ingresar');
//Route::get('/Ingresar',[LoginController::class,'Ingresar'])->name('Login.Ingresar');
Route::view('/Main', 'Main/Main') -> name('Main');
Route::view('/Create_tickets', 'view_new_tickets/Create_tickets')->name('Create_tickets');
Route::view('/table_users', 'view_users/Table_users')->name('Table_users');
Route::view('/Inicio', 'Main/Inicio')->name('View_Inicio');
