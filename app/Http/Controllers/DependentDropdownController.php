<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Curso;
use App\Models\Personal;
use App\Models\Subcategory;

class DependentDropdownController extends Controller
{


    public function getCursos()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }

    public function getEstudiantes($cursoId)
    {
        $estudiantes = Personal::where('cursos', $cursoId)->get();
        return response()->json($estudiantes);
    }

   
   



}
