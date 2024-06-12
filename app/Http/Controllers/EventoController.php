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
        $evento = Evento::all()->where('estado', 1);
        $eventos = new Evento();

        return view('Evento.index', compact('evento', 'eventos'));
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
        $eventos->Fecha = $request->Fecha;
        $eventos->Hora = $request->Hora;
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
    public function edit($id)
    {
        $evento = Evento::find($id);

        return view('Evento.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        request()->validate(Evento::$rules);

        $evento->update($request->all());

        return redirect()->route('eventos.index')
            ->with('success', 'Evento Editado con éxito')
            ->with('title', 'Guardado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calificaciones = Evento::find($id);

        if ($calificaciones) {
            // Verifica si el estado actual es 1
            if ($calificaciones->estado === 1) {
                // Estado actual es 1, entonces actualiza a 0
                $calificaciones->update(['estado' => 0]);
                return redirect()->route('eventos.index')
                    ->with('success', 'Evento eliminado con éxito')
                    ->with('title', 'Eliminado');
            } else {
                // Estado actual es 0, entonces actualiza a 1
                $calificaciones->update(['estado' => 1]);
                return redirect()->route('eventos.index')
                    ->with('success', 'Evento activado con éxito')
                    ->with('title', 'Activado');
            }
        } else {
            return redirect()->route('eventos.index')
                ->with('error', 'No se encontró el evento');
        }
    }
}
