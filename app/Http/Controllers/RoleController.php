<?php

namespace App\Http\Controllers;;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all()->where('estado', '1');

        return view('role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view('role.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $role = Role::create(['name' => $request->input('nombre')]);

        return redirect()->route('roles.index')
            ->with('success', 'Rol Creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(role $role)
    {

        $permisos = Permission::all();

        return view('role.rolepermiso', compact('role', 'permisos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permisos);
        return redirect()->route('roles.index');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $Role = Role::find($id);

        if ($Role) {
            // Actualiza el estado a 0 en lugar de eliminar físicamente
            $Role->update(['estado' => 0]);

            // También puedes realizar acciones adicionales si es necesario

            return redirect()->route('roles.index')
                ->with('success', 'rol eliminado con éxito')
                ->with('title', 'Eliminado');
        }
    }
}
