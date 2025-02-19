@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Lista de Chamados</h1>

    <table class="min-w-full bg-white border">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Título</th>
                <th class="py-2 px-4 border">Requerente</th>
                <th class="py-2 px-4 border">Categoria</th>
                <th class="py-2 px-4 border">Data de Abertura</th>
                <th class="py-2 px-4 border">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamados as $chamado)
            <tr>
                <td class="py-2 px-4 border">{{ $chamado->id }}</td>
                <td class="py-2 px-4 border">{{ $chamado->titulo }}</td>
                <td class="py-2 px-4 border">{{ $chamado->usuario->nome }}</td>
                <td class="py-2 px-4 border">{{ $chamado->categoria->nome }}</td>
                <td class="py-2 px-4 border">{{ $chamado->data_abertura }}</td>
                <td class="py-2 px-4 border">
                    <a href="{{ route('chamados.show', $chamado) }}" class="text-blue-500">Ver</a>
                    <a href="{{ route('chamados.edit', $chamado) }}" class="text-green-500">Editar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
