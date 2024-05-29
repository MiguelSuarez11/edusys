<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       // Encuentra el usuario por su ID
       $users = User::findOrFail($id);

       // Obtén los roles asociados al usuario
       $rolesuser = $users->roles;

       // Obtén todos los roles disponibles
       $roles = Role::all();

       // Pasa los datos a la vista
       return view('users.rol', compact('users', 'roles', 'rolesuser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::find($id);

        $users->roles()->sync($request->roles);
        return redirect()->route('usuarios.index')
            ->with('success', 'Rol Asignado con éxito')
            ->with('title', 'Exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {

            $user->delete();

            return redirect()->route('usuarios.index')
                ->with('icono', 'success')
                ->with('success', 'Usuario eliminado con éxito')
                ->with('title', 'Eliminado');
        } else {
            return redirect()->route('usuarios.index')
                ->with('success', 'No se encontró el usuario');
        }
    }
}
