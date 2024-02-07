<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate();
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create(){
        $user = new User();
        return view('auth.register', compact('user'));
    }


    public function store(Request $request){
        request()->validate(User::$rules);
        User::create([
            'documento' => $request->documento,
            'name' => $request->name,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'id_rol' => $request->id_rol,
        ]);
        auth()->attempt($request->only('documento', 'password'));
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente...');
    }


    public function show($id){
        $user = User::find($id);
        return view('user.show', compact('user'));
    }


    public function edit($id){
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }


    public function update(Request $request, User $user){
        request()->validate(User::$rules);
        $user->update($request->all());
        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente...');
    }


    public function destroy($id){
        $user = User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente...');
    }
}
