<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Personal;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CursoProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        $profesores = User::role('Profesor')->get();

        return view('curso.asignacion', compact('cursos', 'profesores'));
    }

    public function asignacionCurso(Personal $user)
    {

        $cursos = Curso::all();
        return view('curso.ProfeCurso', compact('user', 'cursos'));
    }

    public function edit(User $user)
    {
        $user->load('cursos'); // Carga los cursos asociados al usuario
        $cursos = Curso::all();
        return view('curso.ProfeCurso', compact('user', 'cursos'));
    }

    public function update(Request $request, User $user)
    {
        $user->cursos()->sync($request->input('cursos', []));

        return redirect()->route('cursos.asignacion')->with('success', 'Cursos asignados correctamente.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
