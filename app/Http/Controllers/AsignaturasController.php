<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asignaturas = Asignatura::all();
        $asignatura = new Asignatura();
      return view('asignaturas.index',compact('asignaturas','asignatura'));
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
        request()->validate(Asignatura::$rules);

        $asignatura = Asignatura::create($request->all());

        return redirect()->route('asignaturas.index')
        ->with('success', 'Asignatura creada con éxito')
        ->with('title', 'Guardado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asignatura $asignaturas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asignatura = Asignatura::find($id);

        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asignatura $asignaturas)
    {
        request()->validate(Asignatura::$rules);

        $asignaturas->update($request->all());

        return redirect()->route('asignaturas.index')
        ->with('success', 'Asignatura Editada con éxito')
        ->with('title', 'Guardado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asignaturas = Asignatura::find($id)->delete();

        return redirect()->route('asignaturas.index')
        ->with('success', 'Asignatura eliminado con éxito')
        ->with('title', 'Eliminado');
    }
}
