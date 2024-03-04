<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Muesta los eventos en el panel admin
     */
    public function index()
    {
        $eventos = Evento::paginate(5);

        return view('dashboard', ['eventos' => $eventos]);
    }

    // indice de la agenda web
    public function indexWeb()
    {
        $eventos = Evento::Where('categoria_id', '!=', null)->where('estado', 'creado')->where('fecha', '>=', now())->orderBy('fecha', 'asc')->paginate(8);
        $categorias = Categoria::All();
        return view('web.agenda', ['eventos' => $eventos, 'categorias' => $categorias]);
    }

    // inidice de los primeros eventos para la home web
    public function indexFirst()
    {
        $eventos = Evento::Where('categoria_id', '!=', null)->where('estado', 'creado')->where('fecha', '>=', now())->orderBy('fecha', 'asc')->limit(4)->get();
        return view('welcome', ['eventos' => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'asc')->get();

        return view('components.admin.evento-form-crear', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'numeric', 'digits_between:1,2'],
            'minutos' => ['required', 'numeric', 'digits_between:1,2'],
            'descripcion' => ['required', 'string', 'max:400'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'aforoMax' => ['required', 'numeric'],
            'imagen' => ['required'],
            'tipo' => ['required', 'string', 'max:255'],
            'entradasPersona' => ['required', 'numeric'],
        ]);

        // combinar hora y minutos
        $hora = null;
        $minutos = null;

        if ($request->hora < 10) {
            $hora = '0' . $request->hora;
        } else {
            $hora = $request->hora;
        }

        if ($request->minutos < 10) {
            $minutos = '0' . $request->minutos;
        } else {
            $minutos = $request->minutos;
        }

        $horaCompleta = $hora . ':' . $minutos;

        // guardar imagen
        $ruta = $request->file("imagen")->store('public/eventos');
        $rutaArray = explode("/", $ruta);
        $imagen = $rutaArray[count($rutaArray) - 1];

        // crear modelo
        $evento = new Evento();
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora = $horaCompleta;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->estado = 'creado';
        $evento->aforo = $request->aforoMax;
        $evento->tipo = $request->tipo;
        $evento->imagen = $imagen;
        $evento->entradas_persona = $request->entradasPersona;
        $evento->categoria_id = $request->categoria;
        $evento->user_id = $request->user()->id;
        $evento->save();

        // volver a la vista de eventos
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evento = Evento::find($id);
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id;
        }


        $yaInscrito = false;

        if ($userId && $evento) {
            foreach ($evento->inscriptions as $inscription) {
                if ($userId == $inscription->id) {
                    $yaInscrito = true;
                    break;
                }
            }
        }
        return view('web.detalle-evento', ['evento' => $evento, 'inscripto' => $yaInscrito]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evento = Evento::find($id);

        if (Auth::user()->rol != 'Admin') {
            if (Auth::user()->id != $evento->user_id) {
                return redirect()->route('dashboard');
            }
        }

        $evento = Evento::find($id);
        $categorias = Categoria::orderBy('nombre', 'asc')->get();

        return view('components.admin.evento-form-modificar', ['evento' => $evento, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'estado' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'numeric', 'digits_between:1,2'],
            'minutos' => ['required', 'numeric', 'digits_between:1,2'],
            'descripcion' => ['required', 'string', 'max:400'],
            'ciudad' => ['required', 'string', 'max:255'],
            'direccion' => ['required', 'string', 'max:255'],
            'aforoMax' => ['required', 'numeric'],
            'tipo' => ['required', 'string', 'max:255'],
            'entradasPersona' => ['required', 'numeric'],
        ]);

        // buscar evento
        $evento = Evento::find($request->id);

        if (Auth::user()->rol != 'Admin') {
            if (Auth::user()->id != $evento->user_id) {
                return redirect()->route('dashboard');
            }
        }

        // guardar imagen
        if ($request->imagen) {
            $ruta = $request->file("imagen")->store('public/eventos');
            $rutaArray = explode("/", $ruta);
            $imagen = $rutaArray[count($rutaArray) - 1];

            // guardar la imagen nueva
            $evento->imagen = $imagen;
        }

        // combinar hora y minutos
        $hora = null;
        $minutos = null;

        if ($request->hora < 10) {
            $hora = '0' . $request->hora;
        } else {
            $hora = $request->hora;
        }

        if ($request->minutos < 10) {
            $minutos = '0' . $request->minutos;
        } else {
            $minutos = $request->minutos;
        }

        $horaCompleta = $hora . ':' . $minutos;

        // guardar parametros
        $evento->nombre = $request->nombre;
        $evento->fecha = $request->fecha;
        $evento->hora = $horaCompleta;
        $evento->descripcion = $request->descripcion;
        $evento->ciudad = $request->ciudad;
        $evento->direccion = $request->direccion;
        $evento->estado = $request->estado;
        $evento->aforo = $request->aforoMax;
        $evento->tipo = $request->tipo;
        $evento->entradas_persona = $request->entradasPersona;
        $evento->categoria_id = $request->categoria;
        $evento->save();

        // volver a la vista de eventos
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $evento = Evento::find($id);

        if (Auth::user()->rol != 'Admin') {
            if (Auth::user()->id != $evento->user_id) {
                return redirect()->route('dashboard');
            }
        }

        Evento::destroy($id);

        return redirect()->route('dashboard');
    }


    // recoge los datos y pasa la fecha deseada de palabras a un date
    public function filtrar(Request $request)
    {
        $hoy = date('Y-m-d');
        $fechaBuscar = null;
        $categoria = $request->categoria;

        if ($request->fecha == 'semana') {
            $domingoSig = new DateTime($hoy);
            $domingoSig->modify('next Sunday');

            $fechaBuscar = $domingoSig->format('Y-m-d');
        } elseif ($request->fecha == 'mes') {
            $ultimoDiaMes = new DateTime($hoy);
            $ultimoDiaMes->modify('last day of this month');

            $fechaBuscar = $ultimoDiaMes->format('Y-m-d');
        } else {
            $fechaBuscar = 'all';
        }

        if (!$request->categoria) {
            $categoria = 'all';
        }


        return redirect()->route('eventos.filtrado', ['categoria' => $categoria, 'fecha' => $fechaBuscar]);
    }

    // busca en la base da datos los eventos por categoria y fecha
    public function filtrado($categoria, $fecha)
    {
        $eventos = null;

        if ($categoria == 'all' && $fecha == 'all') {
            $eventos = Evento::Where('categoria_id', '!=', null)->where('estado', 'creado')->where('fecha', '>=', now())->orderBy('fecha', 'asc')->paginate(8);
        } elseif ($categoria != 'all' && $fecha == 'all') {
            $eventos = Evento::Where('categoria_id', '=', $categoria)->where('estado', 'creado')->where('fecha', '>=', now())->orderBy('fecha', 'asc')->paginate(8);
        } elseif ($categoria == 'all' && $fecha != 'all') {
            $eventos = Evento::Where('categoria_id', '!=', null)->where('estado', 'creado')->where('fecha', '>=', now())->where('fecha', '<=', $fecha)->orderBy('fecha', 'asc')->paginate(8);
        } else {
            $eventos = Evento::Where('categoria_id', '=', $categoria)->where('estado', 'creado')->where('fecha', '>=', now())->where('fecha', '<=', $fecha)->orderBy('fecha', 'asc')->paginate(8);
        }

        $categorias = Categoria::All();

        return view('web.agenda', ['eventos' => $eventos, 'categorias' => $categorias]);
    }
}
