<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empresa;
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
        $experiencias = Experiencia::Where('categoria_id', '!=', null)->where('fecha', '>=', now())->paginate(8);
        $categorias = Categoria::All();

        return view('web.experiencias', ['experiencias' => $experiencias, 'categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::orderBy('nombre', 'asc')->get();
        $categorias = Categoria::orderBy('nombre', 'asc')->get();

        return view('components.admin.experiencia-form-crear', ['empresas' => $empresas, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'fechaString' => ['required', 'string', 'max:255'],
            'descripcionCorta' => ['required', 'string', 'max:400'],
            'descripcionLarga' => ['required', 'string', 'max:400'],
            'link' => ['required', 'string', 'max:255'],
            'imagen' => ['required'],
            'precio' => ['required'],
        ]);

        $ruta = $request->file("imagen")->store('public/experiencias');
        $rutaArray = explode("/", $ruta);
        $imagen = $rutaArray[count($rutaArray) - 1];

        $experiencia = new Experiencia();
        $experiencia->nombre = $request->nombre;
        $experiencia->fecha = $request->fecha;
        $experiencia->fecha_string = $request->fechaString;
        $experiencia->descripcion_corta = $request->descripcionCorta;
        $experiencia->descripcion_larga = $request->descripcionLarga;
        $experiencia->precio = $request->precio;
        $experiencia->link = $request->link;
        $experiencia->imagen = $imagen;
        $experiencia->empresa_id = $request->empresa;
        $experiencia->categoria_id = $request->categoria;
        $experiencia->save();

        return redirect()->route('experiencia.view');
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
    public function destroy($id)
    {
        Experiencia::destroy($id);

        return redirect()->route('experiencia.view');
    }
}
