<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//rutas paciente
Route::get('/pacientes', [PacienteController::class, 'index']);
Route::get('/pacientes/show', [PacienteController::class, 'show']);
Route::get('/pacientes/create', [PacienteController::class, 'create']);
Route::post('/pacientes', [PacienteController::class, 'store']);
Route::get('/pacientes/{id}/edit', [PacienteController::class, 'edit']);
Route::put('/pacientes/{id}', [PacienteController::class, 'update']);
Route::delete('/pacientes{id}', [PacienteController::class, 'destroy']);




//rutas doctores
Route::get('/doctores', [DoctorController::class, 'index']);
Route::get('/doctores/show', [DoctorController::class, 'show']);
Route::get('/doctores/create', [DoctorController::class, 'create']);
Route::post('/doctores', [DoctorController::class, 'store']);
Route::get('/doctores/{id}/edit', [DoctorController::class, 'edit']);
Route::put('/doctores/{id}', [DoctorController::class, 'update']);
Route::delete('/doctores/{id}', [DoctorController::class, 'destroy']);



//rutas citas
Route::get('/citas', [CitaController::class, 'index']);
Route::get('/citas/show', [CitaController::class, 'show']);
Route::get('/citas/create', [CitaController::class, 'create']);
Route::post('/citas', [CitaController::class, 'store']);
Route::get('/citas/{id}/edit', [CitaController::class, 'edit']);
Route::put('/citas/{id}', [CitaController::class, 'update']);
Route::delete('/citas/{id}', [CitaController::class, 'destroy']);




//rutas consultas
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::get('/consultas/show', [ConsultaController::class, 'show']);
Route::get('/consultas/create', [ConsultaController::class, 'create']);
Route::post('/consultas', [ConsultaController::class, 'store']);
Route::get('/consultas/{id}/edit', [ConsultaController::class, 'edit']);
Route::put('/consultas/{id}', [ConsultaController::class, 'update']);
Route::delete('/consultas/{id}', [ConsultaController::class, 'destroy']);




//rutas examenes
Route::get('/examenes', [ExamenController::class, 'index']);
Route::get('/examenes/show', [ExamenController::class, 'show']);
Route::get('/examenes/create', [ExamenController::class, 'create']);
Route::post('/examenes', [ExamenController::class, 'store']);
Route::get('/examenes/{id}/edit',[ExamenController::class, 'edit']);
Route::put('/examenes/{id}',[ExamenController::class, 'update']);
Route::delete('/examenes/{id}',[ExamenController::class, 'destroy']);



//rutas medicamentos
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::get('/medicamentos/show', [MedicamentoController::class, 'show']);
Route::get('/medicamentos/create', [MedicamentoController::class, 'create']);
Route::post('/medicamentos', [MedicamentoController::class, 'store']);
Route::get('/medicamentos/{id}/edit', [MedicamentoController::class, 'edit']);
Route::put('/medicamentos/{id}', [MedicamentoController::class, 'update']);
Route::delete('/medicamentos/{id}', [MedicamentoController::class, 'destroy']);





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
