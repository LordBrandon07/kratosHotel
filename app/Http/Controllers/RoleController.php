<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;


class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::paginate();

        return view('role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }


    public function create()
    {
        $role = new Role();
        return view('role.create', compact('role'));
    }


    public function store(Request $request)
    {
        request()->validate(Role::$rules);

        $role = Role::create($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado correctamente...');
    }


    public function show($id)
    {
        $role = Role::find($id);

        return view('role.show', compact('role'));
    }


    public function edit($id)
    {
        $role = Role::find($id);

        return view('role.edit', compact('role'));
    }


    public function update(Request $request, Role $role)
    {
        request()->validate(Role::$rules);

        $role->update($request->all());

        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado correctamente...');
    }


    public function destroy($id)
    {
        try{
            $role = Role::find($id)->delete();

            return redirect()->route('roles.index')
                ->with('success', 'Rol eliminado correctamente...');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el rol: ' . $e->getMessage());
        }
}

}