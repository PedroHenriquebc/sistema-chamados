<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    // Construtor para middleware de autenticação
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    // Exibe a lista de perfis
    public function index()
    {
        $perfis = Perfil::all();
        return view('chamadosp.index', compact('perfis'));
    }

    // Mostra o formulário para criar um novo perfil
    public function create()
    {
        return view('chamadosp.create');
    }

    // Armazena o novo perfil no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Perfil::create($request->all());

        return redirect()->route('chamadosp.index')->with('success', 'Perfil criado com sucesso!');
    }

    // Exibe os detalhes de um perfil específico
    public function show(Perfil $perfil)
    {
        return view('chamadosp.show', compact('perfil'));
    }

    // Mostra o formulário para editar um perfil
    public function edit(Perfil $perfil)
    {
        return view('chamadosp.edit', compact('perfil'));
    }

    // Atualiza um perfil no banco
    public function update(Request $request, Perfil $perfil)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $perfil->update($request->all());

        return redirect()->route('chamadosp.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    // Remove um perfil do banco
    public function destroy(Perfil $perfil)
    {
        $perfil->delete();

        return redirect()->route('chamadosp.index')->with('success', 'Perfil excluído com sucesso!');
    }
}
