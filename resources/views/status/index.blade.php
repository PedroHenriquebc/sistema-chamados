@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Lista de Status</h1>

    <a href="{{ route('status.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Criar Status</a>

    <table class="w-full mt-4 border border-gray-300">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 border">ID</th>
                <th class="p-2 border">Nome</th>
                <th class="p-2 border">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($status as $s)
            <tr>
                <td class="p-2 border">{{ $s->id }}</td>
                <td class="p-2 border">{{ $s->nome }}</td>
                <td class="p-2 border">
                    <a href="{{ route('status.edit', $s) }}" class="text-green-500">Editar</a>
                    <form action="{{ route('status.destroy', $s) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
