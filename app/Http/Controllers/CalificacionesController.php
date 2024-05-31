<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Calificacion;
use App\Models\calificacione;
use App\Models\Category;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Personal;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::where('');
        $tiposCursos = Curso::pluck('nombre', 'id');
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $estudiantes = User::with('personal');
        $calificaciones = Calificacion::all();

        return view('profesor.index', compact('cursos', 'asignaturas', 'estudiantes', 'personal', 'calificaciones', 'tiposCursos'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $calificacions = new Calificacione();
        $cursos = Curso::all();
        $periodos = Periodo::pluck('nombre', 'id');
        $asignaturas = Asignatura::pluck('nombre', 'id');
        return view('profesor.create', compact('categories', 'cursos', 'calificacions', 'asignaturas', 'periodos'));
    }



    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'curso' => 'required|exists:cursos,id',
            'estudiantes' => 'required|exists:personals,id',
            'asignatura' => 'required|exists:asignaturas,id',
            'periodo' => 'required|in:1,2,3,4',
            'nota1' => 'required|numeric|min:0|max:100',
            'nota2' => 'required|numeric|min:0|max:100',
            'nota3' => 'required|numeric|min:0|max:100',
            'nota4' => 'required|numeric|min:0|max:100',
            'definitiva' => 'required|numeric|min:0|max:100',
        ]);

        $calificaciones = new Calificacione();
        $calificaciones->curso_id = $request->curso;
        $calificaciones->personal_id = $request->estudiantes;
        $calificaciones->asignatura_id = $request->asignatura;
        $calificaciones->periodo_id = $request->periodo;
        $calificaciones->nota_1 = $request->nota1;
        $calificaciones->nota_2 = $request->nota2;
        $calificaciones->nota_3 = $request->nota3;
        $calificaciones->nota_4 = $request->nota4;
        $calificaciones->nota_definitiva = $request->definitiva;

        $calificaciones->save();


        // Buscar una calificación existente por personal_id y asignatura_id
        $calificacion = Calificacion::where('personal_id', $request->estudiantes)
            ->where('asignatura_id', $request->asignatura)
            ->first();

        if ($calificacion) {
            // Actualizar el campo del periodo correspondiente
            switch ($request->periodo) {
                case 1:
                    $calificacion->periodo_1 = $request->definitiva;
                    break;
                case 2:
                    $calificacion->periodo_2 = $request->definitiva;
                    break;
                case 3:
                    $calificacion->periodo_3 = $request->definitiva;
                    break;
                case 4:
                    $calificacion->periodo_4 = $request->definitiva;
                    break;
            }

            // Recalcular la nota final
            $calificacion->nota_final = $this->calcularNotaFinal($calificacion);
        } else {
            // Crear una nueva calificación
            $calificacion = new Calificacion();
            $calificacion->personal_id = $request->estudiantes;
            $calificacion->asignatura_id = $request->asignatura;

            switch ($request->periodo) {
                case 1:
                    $calificacion->periodo_1 = $request->definitiva;
                    break;
                case 2:
                    $calificacion->periodo_2 = $request->definitiva;
                    break;
                case 3:
                    $calificacion->periodo_3 = $request->definitiva;
                    break;
                case 4:
                    $calificacion->periodo_4 = $request->definitiva;
                    break;
            }

            $calificacion->nota_final = $request->definitiva;
        }

        // Guardar la calificación en la base de datos
        $calificacion->save();

        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('profesor.index')->with('success', 'Calificación guardada con éxito.');
    }

    private function calcularNotaFinal($calificacion)
    {
        $notas = [$calificacion->periodo_1, $calificacion->periodo_2, $calificacion->periodo_3, $calificacion->periodo_4];
        $notasValidas = array_filter($notas, function($nota) {
            return !is_null($nota);
        });

        $suma = array_sum($notasValidas);
        $totalNotas = count($notasValidas);

        return $totalNotas > 0 ? $suma / $totalNotas : 0;
    }

    public function getEstudiantesByCurso($cursoId)
    {
        // Obtener los estudiantes del curso específico
        $estudiantes = Personal::where('cursos', $cursoId)->get();

        // Retornar la respuesta como JSON
        return response()->json($estudiantes);
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
