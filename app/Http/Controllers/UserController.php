<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }


    public function create()
    {
        $user = new User();
        $roles = Role::pluck('nombre','id');
        return view('auth.register', compact('user','roles'));
    }


    public function store(Request $request){
        // Validación de los datos del formulario
        $request->validate([
            'tipo_doc' => 'required|in:"CC","CE","PS","PEP"',
            'documento' => 'required|numeric|digits_between:5,15',
            'nombres' => 'required|regex:/^[a-zA-Z\s]+$/',
            'apellidos' => 'required|regex:/^[a-zA-Z\s]+$/',
            'fecha_nacimiento' => 'required|date|before_or_equal:-18 years', // Asegura que la fecha de nacimiento sea de hace al menos 18 años
            'email' => [
                'required',
                'email',
                'regex:/^.+@.+?\..+$/',
                Rule::unique('users'), // Asegura que el correo electrónico sea único en la tabla 'users'
            ],
            'password' => [
                'required',
                'min:8',
                // Expresión regular personalizada para requerir al menos una mayúscula y un número
                'regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            ],
            'telefono' => 'required|numeric|digits_between:7,12', // Validación de número de teléfono
            'id_rol' => 'required',
        ]);
    
        // Crear un nuevo usuario con los datos proporcionados
        User::create([
            'tipo_doc' => $request->tipo_doc,
            'documento' => $request->documento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'id_rol' => $request->id_rol,
        ]);
    
        // Intento de inicio de sesión para el nuevo usuario
        auth()->attempt($request->only('documento', 'password'));
    
        // Redireccionar a la ruta de índice de usuarios con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente...');
    }


    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }


    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('nombre','id');
        return view('user.edit', compact('user','roles'));
    }


    public function update(Request $request, User $user)
    {
        request()->validate(User::$rules);
        $user->update($request->all());
        return redirect()->route('users.index')
            ->with('success', 'Usuario actualizado correctamente...');
    }


    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success', 'Usuario eliminado correctamente...');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar el usuario: ' . $e->getMessage());
        }
    }
}



