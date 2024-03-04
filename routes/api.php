<?php

use App\Http\Resources\EventoResource;
use App\Http\Resources\ExperienciaResource;
use App\Http\Resources\InscriptionResource;
use App\Http\Resources\UserResource;
use App\Models\Evento;
use App\Models\Experiencia;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RUTA CREACIÓN DE TOKEN: 
Route::post('/tokens/create', function (Request $request) {
    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Unauthorized'
        ], 401);
    }

    return response()->json([
        'token' => $request->user()->createToken($request->email, ['*'], now()->addWeek())->plainTextToken,
        'message' => 'Success'
    ]);
});


Route::prefix('/agencult')->middleware('auth:sanctum')->group(function () {

    // Evento Rutas
    Route::get('/evento', function () {
        return EventoResource::collection(Evento::paginate(8));
    });


    Route::get('/evento/{id}', function ($id) {
        $evento = Evento::where('id', intval($id))->first();

        if ($evento) {
            return new EventoResource($evento);
        }

        return response()->json([
            'message' => 'Evento no encontrado'
        ], 404);
    });


    // Eventos por categoria
    Route::get('/categorias/{id}', function ($id) {
        return EventoResource::collection(Evento::where('categoria_id', $id)->paginate(8));
    });


    // Asistente rutas
    Route::get('/asistente/{dni}', function ($dni) {
        $asistente = User::where('dni', $dni)->where('rol', 'Asistente')->first();

        if ($asistente) {
            return new UserResource($asistente);
        }

        return response()->json([
            'message' => 'No se encontró ningún asistente con ese dni'
        ], 404);
    });


    // Inscripciones Asistente
    Route::get('/asistente/{dni}/inscripciones', function ($dni) {
        $asistente = User::where('dni', $dni)->where('rol', 'Asistente')->first();

        if (!$asistente) {
            return response()->json([
                'message' => 'No se encontró ningún asistente con ese dni'
            ], 404);
        }

        return InscriptionResource::collection(Inscription::where('user_id', $asistente->id)->paginate(10));
    });


    // inscripcion concreta
    Route::get('/asistente/{dni}/inscripciones/{idEvento}', function ($dni, $idEvento) {
        $asistente = User::where('dni', $dni)->where('rol', 'Asistente')->first();

        if (!$asistente) {
            return response()->json([
                'message' => 'No se encontró ningún asistente con ese dni'
            ], 404);
        }

        $inscripcion = Inscription::where('user_id', $asistente->id)->where('evento_id', $idEvento)->first();

        if (!$inscripcion) {
            return response()->json([
                'message' => 'No se encontró ningúna inscripcion con ese evento'
            ], 404);
        }

        return new InscriptionResource($inscripcion);
    });


    // Eperiencias
    Route::get('/experiencias', function () {
        return ExperienciaResource::collection(Experiencia::paginate(8));
    });
});
