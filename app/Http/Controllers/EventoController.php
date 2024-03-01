<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    // indice de la agenda web
    public function indexWeb()
    {
        $eventos = Evento::where('estado', 'creado')->where('fecha', '>=', now())->paginate(8);
        $categorias = Categoria::All();
        return view('web.agenda', ['eventos' => $eventos, 'categorias' => $categorias]);
    }

    // inidice de los primeros eventos para la home web
    public function indexFirst()
    {
        $eventos = Evento::where('estado', 'creado')->where('fecha', '>=', now())->orderBy('fecha', 'asc')->limit(4)->get();
        return view('welcome', ['eventos' => $eventos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evento = Evento::find($id);

        return view('web.detalle-evento', ['evento' => $evento]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
