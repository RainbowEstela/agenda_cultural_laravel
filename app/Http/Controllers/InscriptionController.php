<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{

    //inscribe un usuario a un evento si no está ya inscrito
    public function inscribirse(Request $request)
    {
        $idEvento = intval($request->evento);
        $idUser = $request->user()->id;
        $numEntradas = intval($request->entradas);

        $yaInscrito = false;

        $inscripcionesUsuario = Inscription::where('user_id', '=', $idUser)->get();

        foreach ($inscripcionesUsuario as $inscription) {
            if ($inscription->evento_id == $idEvento) {
                $yaInscrito = true;
                break;
            }
        }



        if (!$yaInscrito) {
            $newInscription = new Inscription();
            $newInscription->user_id = $idUser;
            $newInscription->evento_id = $idEvento;
            $newInscription->estado = 'recibida';
            $newInscription->numero_entradas = $numEntradas;
            $newInscription->save();
        }

        return redirect()->route('eventos.detalle', ['id' => $idEvento]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Inscription $inscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscription $inscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscription $inscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inscription $inscription)
    {
        //
    }
}
