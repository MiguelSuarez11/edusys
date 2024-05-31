<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Curso;
use App\Models\Personal;
use App\Models\Subcategory;

class DependentDropdownController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function getSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

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

    public function showForm()
    {
        $categories = Category::all();
        $cursos = Curso::all(); // Esto debe devolver una colección de objetos Curso
        return view('dependent-dropdown', compact('categories' , 'cursos'));
    }



}
