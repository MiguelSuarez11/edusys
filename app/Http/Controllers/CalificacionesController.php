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

    //     public function getCategories()
    //     {
    //         $categories = Category::all();
    //         return response()->json($categories);
    //     }

    //     public function getSubcategories($categoryId)
    //     {
    //         $subcategories = Subcategory::where('category_id', $categoryId)->get();
    //         return response()->json($subcategories);
    //     }
    //     public function showForm()
    // {
    //     $categories = Category::all();
    //     return view('dependent-dropdown', compact('categories'));
    // }
    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Recuperar la persona basada en el nombre (suponiendo que se envía el nombre en la solicitud)
    //     $nombre = $request->input('nombre');

    //     $persona = Personal::where('nombres', $nombre)->first();

    //     // Verificar si se encontró la persona
    //     if (!$persona) {
    //         // Manejar la situación si la persona no se encuentra
    //         return redirect()->back()->with('error', 'No se pudo encontrar la persona.');
    //     }

    //     // Crear una nueva instancia de Calificacion
    //     $calificacion = new Calificacion();
    //     $calificacion->nota_1 = $request->input('nota1');
    //     $calificacion->nota_2 = $request->input('nota2');
    //     $calificacion->nota_3 = $request->input('nota3');
    //     $calificacion->nota_4 = $request->input('nota4');
    //     $calificacion->nota_definitiva = ($request->input('nota1') * 0.25) + ($request->input('nota2') * 0.25) + ($request->input('nota3') * 0.25) + ($request->input('nota4') * 0.25);

    //     // Asignar la persona asociada a la calificación
    //     $calificacion->persona()->associate($persona);

    //     // Guardar la calificación
    //     $calificacion->save();

    //     return redirect()->back()->with('success', 'Calificación guardada correctamente.');
    // }

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


        // Crear una nueva calificación
        $calificacion = new Calificacion();
        $calificacion->personal_id = $request->estudiantes;

        // Asignar la nota al periodo correspondiente
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

        // Guardar la nota final
        $calificacion->nota_final = $request->definitiva;

        // Guardar la calificación en la base de datos
        $calificacion->save();

        // Redireccionar a una página de éxito o mostrar un mensaje de éxito
        return redirect()->route('profesor.index')->with('success', 'Calificación guardada con éxito.');
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
