<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Perfil;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Exibe a lista de categorias
    public function index()
    {
        $categorias = Categoria::with('perfil')->get();
        return view('categorias.index', compact('categorias'));
    }

    // Mostra o formulário para criar uma nova categoria
    public function create()
    {
        $perfis = Perfil::all();
        return view('categorias.create', compact('perfis'));
    }

    // Armazena a nova categoria no banco
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'perfil_id' => 'required|exists:perfis,id',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Exibe os detalhes de uma categoria específica
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // Mostra o formulário para editar uma categoria
    public function edit(Categoria $categoria)
    {
        $perfis = Perfil::all();
        return view('categorias.edit', compact('categoria', 'perfis'));
    }

    // Atualiza uma categoria no banco
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'perfil_id' => 'required|exists:perfis,id',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Remove uma categoria do banco
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
