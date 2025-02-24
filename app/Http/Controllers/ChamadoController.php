<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;
use App\Models\Chamado;
use App\Models\Status;

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
        // Validação dos dados enviados
        $data = $request->validate([
            'titulo'      => 'required|string|max:255',
            'descricao'   => 'required|string',
            'categoria_id'=> 'required|exists:categorias,id',
        ]);

        $statusAberto = Status::where('nome', 'Aberto')->firstOrFail();

        // Adiciona o usuário autenticado e a data de abertura
        $data['usuario_id']    = Auth::id();
        //auth()->id();
        $data['data_abertura'] = now();

        $data['status_id'] = $statusAberto->id;

        // Cria o chamado
        Chamado::create($data);

        // Redireciona para a listagem com mensagem de sucesso
        return redirect()->route('chamados.index')
                         ->with('success', 'Chamado criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um chamado.
     */
    public function show($id)
    {
        $chamado = Chamado::findOrFail($id);

        return view('chamados.show', compact('chamado'));
    }

    /**
     * Exibe o formulário para editar um chamado.
     */
    public function edit($id)
    {
        $chamado = Chamado::findOrFail($id);
        // Busca todas as categorias para o dropdown de seleção
        $categorias = Categoria::all();
        $statuses = Status::all(); // Buscar todos os status

        return view('chamados.edit', compact('chamado', 'categorias', 'statuses'));
    }

    /**
     * Atualiza os dados de um chamado.
     */
    public function update(Request $request, $id)
{
    $chamado = Chamado::findOrFail($id);

    $data = $request->validate([
        'titulo'      => 'required|string|max:255',
        'descricao'   => 'required|string',
        'categoria_id'=> 'required|exists:categorias,id',
        'status_id'   => 'required|exists:statuses,id',
    ]);

    // Verifica se o status foi alterado para "Em Desenvolvimento"
    if ($chamado->status_id != $request->status_id) {
        $status = Status::find($request->status_id);

        if ($status->nome == 'Em Desenvolvimento' && is_null($chamado->data_inicio_desenvolvimento)) {
            $data['data_inicio_desenvolvimento'] = now();
        }

        if ($status->nome == 'Fechado' && is_null($chamado->data_fechamento)) {
            $data['data_fechamento'] = now();
        }
    }

    $chamado->update($data);

    return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $chamado = Chamado::findOrFail($id);

        // Exclui o chamado
        $chamado->delete();

        // Redireciona para a listagem com uma mensagem de sucesso
        return redirect()->route('chamados.index')
                        ->with('success', 'Chamado excluído com sucesso!');
    }
}
