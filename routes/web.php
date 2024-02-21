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
    Route::get('/explora', function () {
        return view('web.explora');
    })->name("explora");


    // vista de experiencias
    Route::get('/experiencias', function () {
        return view('web.experiencias');
    })->name("experiencias");

    // vista de experiencias detalle
    Route::get('/experiencias/{id}', function () {
        return view('web.experiencias');
    })->name("experiencias.detalle");


    // vista de eventos
    Route::get('/eventos', function () {
        return view('web.agenda');
    })->name("eventos");

    // vista de detalle de evento
    Route::get('/eventos/{id}', function () {
        return view('welcome');
    })->name("eventos.detalle");
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
