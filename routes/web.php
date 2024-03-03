<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Empresa;
use App\Models\Evento;
use App\Models\Experiencia;
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

// pagina inicio web
Route::get('/', [EventoController::class, 'indexFirst'])->name('home');

Route::prefix("web")->group(function () {
    // vista pagina estatica
    Route::get('/explora', function () { // TO DO
        return view('web.explora');
    })->name("explora");


    // vista de experiencias
    Route::get('/experiencias', [ExperienciaController::class, 'indexWeb'])->name("experiencias");

    // vista de experiencias detalle
    Route::get('/experiencias/{id}', [ExperienciaController::class, 'show'])->name("experiencias.detalle");


    // vista de eventos
    Route::get('/eventos', [EventoController::class, 'indexWeb'])->name("eventos");

    // vista de detalle de evento
    Route::get('/eventos/{id}', [EventoController::class, 'show'])->name("eventos.detalle");

    // incribirse a un evento
    Route::post('/eventos', [InscriptionController::class, 'inscribirse'])->name("eventos.incribirse")->middleware(['auth', 'verified', 'mdrol:Asistente']);
});

// Paginas Admin

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Rutas de eventos
    Route::prefix('eventos')->middleware(['mdrol:Admin|CreadorEventos'])->group(function () {
        Route::get('/view', [EventoController::class, 'index'])->name('dashboard');

        Route::get('/create', [EventoController::class, 'create'])->name('evento.crear');

        Route::post('/store', [EventoController::class, 'store'])->name('evento.guardar');

        Route::get('/edit/{id}', [EventoController::class, 'edit'])->name('evento.editar');

        Route::post('/update', [EventoController::class, 'update'])->name('evento.modificar');

        Route::get('/delete/{id}', [EventoController::class, 'destroy'])->name('evento.borrar');
    });

    // Rutas de inscripciones
    Route::prefix('incripciones')->middleware(['mdrol:Admin|CreadorEventos'])->group(function () {
        Route::get('/evento/{id}', [InscriptionController::class, 'index'])->name('incripcion.view');

        Route::get('/cancelar/{id}', [InscriptionController::class, 'cancelar'])->name('incripcion.cancelar');
    });

    // Rutas de experiencias
    //                            Las experiencias solo las gestionan los admins
    Route::prefix('experiencias')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [ExperienciaController::class, 'index'])->name('experiencia.view');

        Route::get('/create', [ExperienciaController::class, 'create'])->name('experiencia.crear');

        Route::post('/store', [ExperienciaController::class, 'store'])->name('experiencia.guardar');

        Route::get('/delete/{id}', [ExperienciaController::class, 'destroy'])->name('experiencia.borrar');
    });

    // Rutas de usuarios
    Route::prefix('usuarios')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [UserController::class, 'index'])->name('usuario.view');

        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('usuario.borrar');
    });

    // Rutas de categorias
    Route::prefix('categorias')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [CategoriaController::class, 'index'])->name('categoria.view');

        Route::get('/create', [CategoriaController::class, 'create'])->name('categoria.crear');

        Route::post('/store', [CategoriaController::class, 'store'])->name('categoria.guardar');

        Route::get('/delete/{id}', [CategoriaController::class, 'destroy'])->name('categoria.borrar');
    });

    // Rutas de empresa
    Route::prefix('empresas')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [EmpresaController::class, 'index'])->name('empresa.view');

        Route::get('/create', [EmpresaController::class, 'create'])->name('empresa.crear');

        Route::post('/store', [EmpresaController::class, 'store'])->name('empresa.guardar');

        Route::get('/delete/{id}', [EmpresaController::class, 'destroy'])->name('empresa.borrar');
    });
});

/*
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
*/
require __DIR__ . '/auth.php';
