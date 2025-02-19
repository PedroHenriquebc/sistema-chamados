@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Detalhes do Chamado</h1>

    <div class="bg-white p-4 rounded shadow-md">
        <p><strong>ID:</strong> {{ $chamado->id }}</p>
        <p><strong>Título:</strong> {{ $chamado->titulo }}</p>
        <p><strong>Descrição:</strong> {{ $chamado->descricao }}</p>
        <p><strong>Requerente:</strong> {{ $chamado->usuario->nome }}</p>
        <p><strong>Categoria:</strong> {{ $chamado->categoria->nome }}</p>
        <p><strong>Data de Abertura:</strong> {{ $chamado->data_abertura }}</p>
        <p><strong>Status:</strong> {{ $chamado->status }}</p>

        <div class="mt-4">
            <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Voltar</a>
            <a href="{{ route('chamados.edit', $chamado) }}" class="px-4 py-2 bg-blue-500 text-white rounded">Editar</a>
        </div>
    </div>
</div>
@endsection
