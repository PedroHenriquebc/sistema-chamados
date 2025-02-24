@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 dark:text-gray-300">Nome da Categoria</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>
        <div class="mt-4 space-x-2">
        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500">Atualizar Categoria</button>
        <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">Voltar</a>
        </div>
    </form>
</div>
@endsection
