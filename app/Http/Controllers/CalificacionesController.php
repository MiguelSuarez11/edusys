<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\vs_genero;
use App\Models\Asignatura;

use App\Models\calificaciones;
use App\Models\Curso;
use App\Models\Role;
use App\Models\User;
use App\Models\Personal;
use Illuminate\Http\Request;


class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::where('');
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $estudiantes = User::with('personal');
        $calificaciones = Calificacion::all();
        return view("profesor.index", compact('cursos', 'asignaturas', 'estudiantes', 'personal','calificaciones'));
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
    // Recuperar la persona basada en el nombre (suponiendo que se envía el nombre en la solicitud)
    $nombre = $request->input('nombre');

    $persona = Personal::where('nombres', $nombre)->first();

    // Verificar si se encontró la persona
    if (!$persona) {
        // Manejar la situación si la persona no se encuentra
        return redirect()->back()->with('error', 'No se pudo encontrar la persona.');
    }

    // Crear una nueva instancia de Calificacion
    $calificacion = new Calificacion();
    $calificacion->nota_1 = $request->input('nota1');
    $calificacion->nota_2 = $request->input('nota2');
    $calificacion->nota_3 = $request->input('nota3');
    $calificacion->nota_4 = $request->input('nota4');
    $calificacion->nota_definitiva = ($request->input('nota1') * 0.25) + ($request->input('nota2') * 0.25) + ($request->input('nota3') * 0.25) + ($request->input('nota4') * 0.25);
    
    // Asignar la persona asociada a la calificación
    $calificacion->persona()->associate($persona);

    
    // Guardar la calificación
    $calificacion->save();

   

    return redirect()->back()->with('success', 'Calificación guardada correctamente.');
}

     

    /**
     * Display the specified resource.
     */
    public function show(calificacion $calificaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(calificacion $calificaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, calificacion $calificaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(calificacion $calificaciones)
    {
        //
    }
}
