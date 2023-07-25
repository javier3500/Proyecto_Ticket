<?php

use App\Http\Controllers\CreateDepartamentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ViewTicketController;
use App\Http\Controllers\ViewUsersTableController;
use Illuminate\Support\Facades\Route;

//RUTAS LOGIC
Route::get('/', [LoginController::class,'inicio'])->name('Login.inicio');
Route::post('/ingresar', [LoginController::class,'Ingresar'])->name('ingresar');


//RUTAS CREATE TICKET
Route::post('/new_ticket', [TicketController::class, 'Input_Ticket'])->name('new_ticket');
Route::view('/Create_tickets', 'view_new_tickets/Create_tickets')->name('tickets');

//RUTAS USUARIO
Route::get('/table_users', [ViewUsersTableController::class, 'view_table_date'])->name('datos_table');
Route::put('/update_tables', [ViewUsersTableController::class, 'update'])->name('capturar');

Route::view('/Inicio', 'Main/Inicio')->name('View_Inicio'); 

//RUTAS DEPARTAMENTOS
Route::get('/view_departament', [CreateDepartamentController::class,'view_departament'])->name('view_departament');
Route::post('/new_departament', [CreateDepartamentController::class,'insert_departament'])->name('insert_departament');
Route::put('/update_departament', [CreateDepartamentController::class,'update_departament'])->name('update_departament');

//RUTAS TICKET
Route::get('/view_ticket', [ViewTicketController::class,'mostrar'])->name('view_ticket');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
