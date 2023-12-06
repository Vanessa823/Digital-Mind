<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\CriterioController;
use App\Http\Controllers\PeriodoController;

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
    return redirect('/login');
});


Route::middleware('auth:sanctum')->resource('proyectos',ProyectoController::class);
Route::middleware('auth:sanctum')->resource('areas',AreaController::class);
Route::middleware('auth:sanctum')->resource('tareas',TareaController::class);
Route::middleware('auth:sanctum')->resource('empleados',EmpleadoController::class);
Route::middleware('auth:sanctum')->resource('criterios',CriterioController::class);
Route::middleware('auth:sanctum')->resource('periodos',PeriodoController::class);

use App\Http\Controllers\CalificaController;

Route::middleware('auth:sanctum')->get('proyectos/{proyecto}/edit2', [ProyectoController::class,'edit2'])->name('proyectos.edit2');

Route::middleware('auth:sanctum')->post('proyectos/{proyecto}/updateEstado',[ProyectoController::class,'updateEstado'] )->name('proyectos.updateEstado');

Route::middleware('auth:sanctum')->prefix('empleados')->group(function () {
    Route::get('{empleado}/edit2', [CalificaController::class, 'edit2'])->name('CalificaController.edit2');
    Route::post('{empleado}/store', [CalificaController::class, 'store'])->name('CalificaController.store');
    Route::post('{empleado}/edit2',[CalificaController::class,'califica'])->name('calificacontroller.edit2');
    Route::get('{empleado}/show',[CalificaController::class,'show'])->name('calificacontroller.show');
    Route::post('{empleado}/show',[CalificaController::class,'show2'])->name('calificacontroller.show');
    
    // Otros métodos y rutas según sea necesario
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
