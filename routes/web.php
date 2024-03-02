<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ExperienciaController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ProfileController;
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

        Route::get('/create', function () { // TO DO
            return view('components.admin.evento-form-crear');
        })->name('evento.crear');

        Route::post('/store', function () { // TO DO
            return view('dashboard');
        })->name('evento.guardar');

        Route::get('/edit', function () { // TO DO
            return view('dashboard');
        })->name('evento.editar');

        Route::post('/update', function () { // TO DO
            return view('dashboard');
        })->name('evento.modificar');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('evento.borrar');

        Route::get('/cancelar/{id}', function () { // TO DO
            return view('dashboard');
        })->name('evento.cancelar');
    });

    // Rutas de inscripciones
    Route::prefix('incripciones')->middleware(['mdrol:Admin|CreadorEventos'])->group(function () {
        Route::get('/evento/{id}', function () { // TO DO
            return view('dashboard');
        })->name('incripcion.view');

        Route::get('/cancelar/{id}', function () { // TO DO
            return view('dashboard');
        })->name('incripcion.cancelar');
    });

    // Rutas de experiencias
    //                            Las experiencias solo las gestionan los admins
    Route::prefix('experiencias')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [ExperienciaController::class, 'index'])->name('experiencia.view');

        Route::get('/create', function () { // TO DO
            return view('components.admin.experiencia-form-crear');
        })->name('experiencia.crear');

        Route::post('/store', function () { // TO DO
            return view('dashboard');
        })->name('experiencia.guardar');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('experiencia.borrar');

        Route::get('/empresa/{empresa}/asignar/{id}', function () { // TO DO
            return view('dashboard');
        })->name('experiencia.asignar');
        Route::get('/empresa/{empresa}/quitar/{id}', function () { // TO DO
            return view('dashboard');
        })->name('experiencia.quitar');
    });

    // Rutas de usuarios
    Route::prefix('usuarios')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', function () { // TO DO
            return view('components.admin.usuario-view');
        })->name('usuario.view');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('usuario.borrar');
    });

    // Rutas de categorias
    Route::prefix('categorias')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', function () { // TO DO
            return view('components.admin.categoria-view');
        })->name('categoria.view');

        Route::get('/create', function () { // TO DO
            return view('components.admin.categoria-form-crear');
        })->name('categoria.crear');

        Route::post('/store', function () { // TO DO
            return view('dashboard');
        })->name('categoria.guardar');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('categoria.borrar');
    });

    // Rutas de empresa
    Route::prefix('empresas')->middleware(['mdrol:Admin'])->group(function () {
        Route::get('/view', [EmpresaController::class, 'index'])->name('empresa.view');

        Route::get('/create', function () { // TO DO
            return view('components.admin.empresa-form-crear');
        })->name('empresa.crear');

        Route::post('/store', function () { // TO DO
            return view('dashboard');
        })->name('empresa.guardar');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('empresa.borrar');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
