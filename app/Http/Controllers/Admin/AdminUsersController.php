<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.home', compact('users'));
    }

    public function create()
    {
        $user = new User();
        return view('admin.users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role_id'  => 'required|integer', // Aceptará 1 o 2 según el form
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role_id'  => $request->role_id,
        ]);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => ['required', 'email', Rule::unique('users')->ignore($id)],
            'role_id' => 'required|integer',
            'password'=> 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'role_id' => $request->role_id,
        ];

        // Solo actualizamos contraseña si el campo no está vacío
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);


        if (Petition::where('user_id', $id)->exists()) {
            return back()->with('error', 'No se puede eliminar: el usuario ha creado peticiones. Debes eliminarlas antes.');
        }


        if (DB::table('petition_user')->where('user_id', $id)->exists()) {

            return back()->with('error', 'No se puede eliminar: el usuario ha firmado peticiones. Sus firmas siguen activas.');


        }

        $user->delete();

        return back()->with('success', 'Usuario eliminado correctamente.');
    }
}
