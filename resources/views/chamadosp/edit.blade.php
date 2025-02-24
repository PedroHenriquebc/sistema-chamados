@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Editar Perfil</h1>

    <form action="{{ route('chamadosp.update', $perfil) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 dark:text-gray-300">Nome do Perfil</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $perfil->nome) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-gray-700 dark:text-gray-300">Descrição do Perfil</label>
            <textarea id="descricao" name="descricao" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>{{ old('descricao', $perfil->descricao) }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500">Atualizar Perfil</button>
    </form>
</div>
@endsection
