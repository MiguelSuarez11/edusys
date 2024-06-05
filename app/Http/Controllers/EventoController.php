<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evento = Evento::all();
        $eventos = new Evento();
        return view('Evento.index', compact('evento' , 'eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Evento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $eventos = new Evento();
        $eventos->Nombre = $request->Nombre;
        $eventos->Descripcion = $request->Descripcion;
        $eventos->save();

        return redirect()->route('eventos.index')
            ->with('success', 'Evento creado con éxito')
            ->with('title', 'Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evento = Evento::find($id); // O cualquier otra lógica para obtener un solo modelo
        return view('tu.vista', compact('evento'));
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
