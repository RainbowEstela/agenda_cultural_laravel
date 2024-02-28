<?php

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
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix("web")->group(function () {
    // vista pagina estatica
    Route::get('/explora', function () { // TO DO
        return view('web.explora');
    })->name("explora");


    // vista de experiencias
    Route::get('/experiencias', function () { // TO DO
        return view('web.experiencias');
    })->name("experiencias");

    // vista de experiencias detalle
    Route::get('/experiencias/{id}', function () { // TO DO
        return view('web.detalle-experiencia');
    })->name("experiencias.detalle");


    // vista de eventos
    Route::get('/eventos', function () { // TO DO
        return view('web.agenda');
    })->name("eventos");

    // vista de detalle de evento
    Route::get('/eventos/{id}', function () { // TO DO
        return view('web.detalle-evento');
    })->name("eventos.detalle");

    Route::get('/eventos/{id}/incribirse', function () { // CAMBIAR A POST
    })->name("eventos.incribirse");
});

// Paginas Admin

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Rutas de eventos
    Route::prefix('eventos')->group(function () {
        Route::get('/view', function () { // TO DO
            return view('dashboard');
        })->name('dashboard');

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
    Route::prefix('incripciones')->group(function () {
        Route::get('/evento/{id}', function () { // TO DO
            return view('dashboard');
        })->name('incripcion.view');

        Route::get('/cancelar/{id}', function () { // TO DO
            return view('dashboard');
        })->name('incripcion.cancelar');
    });

    // Rutas de experiencias
    Route::prefix('experiencias')->group(function () {
        Route::get('/view', function () { // TO DO
            return view('components.admin.experiencia-view');
        })->name('experiencia.view');

        Route::get('/create', function () { // TO DO
            return view('dashboard');
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
    Route::prefix('usuarios')->group(function () {
        Route::get('/view', function () { // TO DO
            return view('components.admin.usuario-view');
        })->name('usuario.view');

        Route::get('/delete/{id}', function () { // TO DO
            return view('dashboard');
        })->name('usuario.borrar');
    });

    // Rutas de categorias
    Route::prefix('categorias')->group(function () {
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
    Route::prefix('empresas')->group(function () {
        Route::get('/view', function () { // TO DO
            return view('components.admin.empresa-view');
        })->name('empresa.view');

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
