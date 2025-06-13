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



//rutas doctores
Route::get('/doctores', [DoctorController::class, 'index']);
Route::get('/doctores/show', [DoctorController::class, 'show']);
Route::get('/doctores/create', [DoctorController::class, 'create']);
Route::post('/doctores', [DoctorController::class, 'store']);


//rutas citas
Route::get('/citas', [CitaController::class, 'index']);
Route::get('/citas/show', [CitaController::class, 'show']);
Route::get('/citas/create', [CitaController::class, 'create']);
Route::get('/citas', [CitaController::class, 'store']);



//rutas consultas
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::get('/consultas/show', [ConsultaController::class, 'show']);


//rutas examenes
Route::get('/examenes', [ExamenController::class, 'index']);
Route::get('/examenes/show', [ExamenController::class, 'show']);
Route::get('/examenes/create', [ExamenController::class, 'create']);
Route::post('/examenes', [ExamenController::class, 'store']);



//rutas medicamentos
Route::get('/medicamentos', [MedicamentoController::class, 'index']);
Route::get('/medicamentos/show', [MedicamentoController::class, 'show']);
Route::get('/medicamentos/create', [MedicamentoController::class, 'create']);
Route::post('/medicamentos', [MedicamentoController::class, 'store']);




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
