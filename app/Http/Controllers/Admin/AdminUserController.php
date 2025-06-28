<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class AdminUserController extends Controller
{
    // Listar utilizadores (excepto admins)
    public function index()
    {
        $users = User::where('role', '!=', 'admin')
                    ->select('id', 'name', 'email', 'role')
                    ->get();

        return Inertia::render('Admin/Users/Index', [
            'users' => $users
        ]);
    }

    // Mostrar um utilizador (opcional)
    public function show(User $user)
    {
        return response()->json([
            'user' => $user
        ]);
    }

    // Actualizar utilizador
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role'  => 'required|string|in:cozinheiro,degustador,editor',
        ]);

        $user->update($request->only('name', 'email', 'role'));

        return redirect()->back()->with('success', 'Utilizador atualizado com sucesso.');
    }

    // Eliminar utilizador
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'Utilizador eliminado com sucesso.');
    }

    // Criar novo utilizador
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|string|in:cozinheiro,degustador,editor',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->back()->with('success', 'Utilizador criado com sucesso.');
    }
}
