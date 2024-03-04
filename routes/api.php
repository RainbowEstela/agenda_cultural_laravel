<?php

use App\Http\Resources\EventoResource;
use App\Http\Resources\ExperienciaResource;
use App\Http\Resources\InscriptionResource;
use App\Http\Resources\UserResource;
use App\Models\Categoria;
use App\Models\Evento;
use App\Models\Experiencia;
use App\Models\Inscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

use function PHPUnit\Framework\isNan;

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


    // Experiencias
    Route::get('/experiencias', function () {
        return ExperienciaResource::collection(Experiencia::paginate(8));
    });


    // crear evento
    Route::post('/evento', function (Request $request) {

        // comprobar que se pasan todos lo parametros
        if (
            !$request->nombre ||
            !$request->fecha ||
            !$request->hora ||
            !$request->minutos ||
            !$request->descripcion ||
            !$request->ciudad ||
            !$request->direccion ||
            !$request->aforo ||
            !$request->tipo ||
            !$request->entradasPersona ||
            !$request->categoriaId
        ) {
            return response()->json([
                'message' => 'parametros incorrectos o vacios',
                'parametros' => 'nombre, fecha, hora, minutos, descripcion, ciudad, direccion, aforo, tipo, entradasPersona, categoriaId',
            ], 400);
        }

        // comprobar el la hora y los minutos
        if (intval($request->hora) > 23 || intval($request->minutos) > 59) {
            return response()->json([
                'message' => 'La hora o los minutos no son válidos',
            ], 400);
        }

        // comprobar la fecha
        if (!strtotime($request->fecha)) {
            return response()->json([
                'message' => 'La fecha no es válida',
            ], 400);
        }

        $fecha = new DateTime($request->fecha);

        // comprobar que la categoria existe
        $categorias = Categoria::all();
        $categoriaExiste = false;

        foreach ($categorias as $categoria) {
            if (intval($request->categoriaId) == $categoria->id) {
                $categoriaExiste = true;
                break;
            }
        }

        if (!$categoriaExiste) {
            return response()->json([
                'message' => 'La categoría no existe',
            ], 400);
        }

        // combinar hora y minutos
        $hora = null;
        $minutos = null;

        if (intval($request->hora) < 10) {
            $hora = '0' . $request->hora;
        } else {
            $hora = $request->hora;
        }

        if (intval($request->minutos) < 10) {
            $minutos = '0' . $request->minutos;
        } else {
            $minutos = $request->minutos;
        }

        $horaCompleta = $hora . ':' . $minutos;


        // crear el nuevo evento
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->fecha = $fecha->format('Y-m-d');
        $evento->hora = $horaCompleta;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->estado = 'creado';
        $evento->aforo = intval($request->aforoMax);
        $evento->tipo = $request->tipo;
        $evento->imagen = 'exp1.jpg';
        $evento->entradas_persona = intval($request->entradasPersona);
        $evento->categoria_id = intval($request->categoriaId);
        $evento->user_id = Auth::user()->id;
        $evento->save();

        return response()->json([
            'message' => 'Creado con exito',
            'evento' => new EventoResource($evento),
        ], 201);
    });

    // borrar evento
    Route::delete('/evento/{id}', function ($id) {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json([
                'message' => 'No se encontró ningún evento'
            ], 404);
        }

        Evento::destroy($id);

        return response()->json([
            'message' => 'Evento borrado con exito'
        ], 200);
    });
});
