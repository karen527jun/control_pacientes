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

//rutas doctores
Route::get('/doctores', [DoctorController::class, 'index']);
Route::get('/doctores/show', [DoctorController::class, 'show']);

//rutas citas
Route::get('/citas', [CitaController::class, 'index']);

//rutas consultas
Route::get('/consultas', [ConsultaController::class, 'index']);

//rutas examenes
Route::get('/examenes', [ExamenController::class, 'index']);

//rutas medicamentos
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::get('/medicamentos/show', [MedicamentoController::class, 'show']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
