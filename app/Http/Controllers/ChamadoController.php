<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = auth()->user();
        $user = Auth::user();

        // Lógica para filtrar os chamados de acordo com o perfil do usuário
        if ($user->perfil->nome === 'Admin' || $user->perfil->nome === 'Comum') {
            // Admin e usuários comuns veem todos os chamados
            $chamados = \App\Models\Chamado::all();
        } else {
            // Para Desenvolvedor ou Infraestrutura, filtra pelo perfil associado à categoria
            $chamados = \App\Models\Chamado::whereHas('categoria', function ($query) use ($user) {
                $query->where('perfil_id', $user->perfil_id);
            })->get();
        }

        return view('chamados.index', compact('chamados'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Buscando todas as categorias disponíveis para que o usuário possa escolher
        $categorias = Categoria::all();

        // Retorna a view de criação de chamados, passando a lista de categorias
        return view('chamados.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
