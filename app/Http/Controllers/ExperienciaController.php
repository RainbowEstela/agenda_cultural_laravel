<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Experiencia;
use Illuminate\Http\Request;

class ExperienciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $experiencias = Experiencia::paginate(8);

        return view('components.admin.experiencia-view', ['experiencias' => $experiencias]);
    }

    // muestra la experiencias en la web
    public function indexWeb()
    {
        $experiencias = Experiencia::where('fecha', '>=', now())->paginate(8);
        $categorias = Categoria::All();

        return view('web.experiencias', ['experiencias' => $experiencias, 'categorias' => $categorias]);
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
        $experiencia = Experiencia::find($id);

        return view('web.detalle-experiencia', ['experiencia' => $experiencia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Experiencia $experiencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Experiencia $experiencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Experiencia $experiencia)
    {
        //
    }
}
