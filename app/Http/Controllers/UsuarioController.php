<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Exibe a lista de usuários
    public function index()
    {
        $usuarios = Usuario::with('perfil')->get();
        return view('usuarios.index', compact('usuarios'));
    }

    // Mostra o formulário para criar um novo usuário
    public function create()
    {
        $perfis = Perfil::all();
        return view('usuarios.create', compact('perfis'));
    }

    // Armazena um novo usuário no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'perfil_id' => 'required|exists:perfis,id'
        ]);

        Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'perfil_id' => $request->perfil_id,
        ]);


        return redirect()->route('usuarios.index')->with('success', 'Usuário criado com sucesso!');
    }

    // Exibe os detalhes de um usuário específico
    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }

    // Mostra o formulário para editar um usuário
    public function edit(Usuario $usuario)
    {
        $perfis = Perfil::all();
        return view('usuarios.edit', compact('usuario', 'perfis'));
    }

    // Atualiza um usuário no banco
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'perfil_id' => 'required|exists:perfis,id'
        ]);

        $usuario->update($request->except(['password']));

        if ($request->filled('password')) {
            $usuario->password = bcrypt($request->password);
            $usuario->save();
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Remove um usuário do banco
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuário excluído com sucesso!');
    }
}
