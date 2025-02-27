<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

class PerfilController extends Controller
{
    /**
     * Exibe a lista de perfis.
     */
    public function index()
    {
        $perfis = Perfil::all();
        return view('perfis.index', compact('perfis'));
    }

    /**
     * Mostra o formulário de criação de perfil.
     */
    public function create()
    {
        return view('perfis.create');
    }

    /**
     * Armazena um novo perfil no banco de dados.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Perfil::create($request->all());

        return redirect()->route('perfis.index')->with('success', 'Perfil criado com sucesso!');
    }

    /**
     * Exibe um perfil específico.
     */
    public function show($id)
    {
        $perfil = Perfil::findOrFail($id);
        return view('perfis.show', compact('perfil'));
    }

    /**
     * Mostra o formulário de edição de um perfil.
     */
    public function edit($id)
    {
        $perfil = Perfil::findOrFail($id);

        return view('perfis.edit', compact('perfil'));
    }

    /**
     * Atualiza um perfil no banco de dados.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $perfil = Perfil::findOrFail($id);
        $perfil->update($data);

        return redirect()->route('perfis.index')->with('success', 'Perfil atualizado com sucesso!');
    }

    /**
     * Remove um perfil do banco de dados.
     */
    public function destroy($id)
    {
        $perfil = Perfil::findOrFail($id);
        $perfil->delete();
        return redirect()->route('perfis.index')->with('success', 'Perfil deletado com sucesso!');
    }
}
