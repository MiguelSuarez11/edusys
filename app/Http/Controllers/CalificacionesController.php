<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Asistencia;
use App\Models\Calificacion;
use App\Models\calificacione;
use App\Models\Category;
use App\Models\Curso;
use App\Models\Periodo;
use App\Models\Personal;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalificacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $cursos = Curso::where('estado', 1)->count();
        $calificacione = Calificacion::where('estado', 1)->count();



        return view('calificaciones.index', compact('cursos', 'calificacione',));
        //
    }


    public function index_calificaciones()
    {
        $personal = Personal::where('');
        $tiposCursos = Curso::pluck('nombre', 'id');
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $estudiantes = User::with('personal');
        $calificaciones = calificacione::all()->where('estado', 1);

        return view('calificaciones.list', compact('cursos', 'asignaturas', 'estudiantes', 'personal', 'calificaciones', 'tiposCursos'))->with('user', auth()->user());


        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $calificacions = new Calificacione();
        $cursos = Curso::all();
        $periodos = Periodo::pluck('nombre', 'id');
        $asignaturas = Asignatura::pluck('nombre', 'id');
        return view('calificaciones.create', compact('cursos', 'calificacions', 'asignaturas', 'periodos'))->with('user', auth()->user());
    }
    public function mostrarAsig($id, User $user)
    {

        $personal = Personal::findOrFail($id);

        //Muestra de notas a los estudiantes
        $asignaturas = Asignatura::all();
        $estudiantes = User::with('personal');
        $calificaciones = Calificacion::all();
        return view('estudiantes.index', compact('personal', 'user', 'asignaturas', 'estudiantes', 'calificaciones'));
    }





    public function getPersonalsByCurso($cursoId)
    {
        // Obtener los personales asociados al cursoId
        $personals = Personal::where('cursos', $cursoId)->get();

        // Añadir la URL de la ruta `personal.show` a cada personal
        $personals->each(function ($personal) {
            $personal->url = route('estudiantes.shows', $personal->id);
        });

        return response()->json($personals);
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
        return redirect()->route('calificaciones.index')->with('success', 'Calificación guardada con éxito.');
    }

    private function calcularNotaFinal($calificacion)
    {
        $notas = [$calificacion->periodo_1, $calificacion->periodo_2, $calificacion->periodo_3, $calificacion->periodo_4];
        $notasValidas = array_filter($notas, function ($nota) {
            return !is_null($nota);
        });

        $suma = array_sum($notasValidas);
        $totalNotas = count($notasValidas);

        return $totalNotas > 0 ? $suma / $totalNotas : 0;
    }



    public function getEstudiantesByCurso($estudianteId)
    {

        // Obtener el estudiante por su ID
        $estudiante = Personal::find($estudianteId);

        // Verificar si el estudiante existe
        if ($estudiante) {
            // Retornar la información del estudiante como respuesta JSON
            return response()->json($estudiante);
        } else {
            // Si el estudiante no existe, devolver una respuesta con un mensaje de error y un código de estado apropiado
            return response()->json(['error' => 'Estudiante no encontrado'], 404);
        }
    }



    public function getEstudiantesByAsig($AsigId, $estudianteId)
    {
        $calificacion = Calificacion::with('personal')
            ->where('asignatura_id', $AsigId)
            ->where('personal_id', $estudianteId)
            ->first();

        return response()->json($calificacion);
    }




    public function getCalificacionEstudiante($asigId, $estudianteId)
    {
        $calificacion = Calificacion::with('personal')
            ->where('asignatura_id', $asigId)
            ->where('personal_id', $estudianteId)
            ->first();

        if ($calificacion) {
            return response()->json($calificacion);
        } else {
            return response()->json(['error' => 'Calificación no encontrada'], 200);
        }
    }






    public function getCalificaciones()
    {
        $calificaciones = Calificacion::with('personal')->get();
        return response()->json($calificaciones, 200, [], JSON_PRETTY_PRINT);
    }

    public function getEstudiantess()
    {
        $estudiantes = calificacione::with('personal_id')->get();
        return response()->json($estudiantes);
    }

    /**
     * Display the specified resource.
     */
    public function show(calificacione $calificaciones)
    {
        $personal = Personal::where('');
        $tiposCursos = Curso::pluck('nombre', 'id');
        $cursos = Curso::all();
        $asignaturas = Asignatura::all();
        $estudiantes = User::with('personal');
        $calificaciones = Calificacion::all();

        return view('calificaciones.show', compact('cursos', 'asignaturas', 'estudiantes', 'personal', 'calificaciones', 'tiposCursos'))->with('user', auth()->user());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $calificacion = Calificacione::find($id);
        $user = Auth::user();
        $asignaturas = Asignatura::pluck('nombre', 'id');
        $periodos = Periodo::pluck('nombre', 'id');
        $estudiantes = Personal::whereHas('cursos', function ($query) use ($calificacion) {
            $query->where('curso_id', $calificacion->curso_id);
        })->get();

        return view('calificaciones.edit', compact('calificacion', 'user', 'asignaturas', 'periodos', 'estudiantes'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nota1' => 'nullable|numeric',
            'nota2' => 'nullable|numeric',
            'nota3' => 'nullable|numeric',
            'nota4' => 'nullable|numeric',
        ]);

        $calificacion = Calificacione::find($id);
        if (!$calificacion) {
            return redirect()->back()->with('error', 'Calificación no encontrada');
        }

        $calificacion->nota_1 = $request->input('nota1') !== null ? floatval($request->input('nota1')) : null;
        $calificacion->nota_2 = $request->input('nota2') !== null ? floatval($request->input('nota2')) : null;
        $calificacion->nota_3 = $request->input('nota3') !== null ? floatval($request->input('nota3')) : null;
        $calificacion->nota_4 = $request->input('nota4') !== null ? floatval($request->input('nota4')) : null;
        $calificacion->nota_definitiva = $request->input('definitiva') !== null ? floatval($request->input('definitiva')) : null;
        $calificacion->save();

        return redirect()->route('calificaciones.index')->with('success', 'Calificación actualizada correctamente');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $calificaciones = Calificacione::find($id);

        if ($calificaciones) {
            // Verifica si el estado actual es 1
            if ($calificaciones->estado === 1) {
                // Estado actual es 1, entonces actualiza a 0
                $calificaciones->update(['estado' => 0]);
                return redirect()->route('calificaciones.index_calificaciones')
                    ->with('success', 'Calificacion eliminada con éxito')
                    ->with('title', 'Eliminado');
            } else {
                // Estado actual es 0, entonces actualiza a 1
                $calificaciones->update(['estado' => 1]);
                return redirect()->route('calificaciones.index')
                    ->with('success', 'Personal activado con éxito')
                    ->with('title', 'Activado');
            }
        } else {
            return redirect()->route('calificaciones.index')
                ->with('error', 'No se encontró la calificaciones');
        }
    }
}
