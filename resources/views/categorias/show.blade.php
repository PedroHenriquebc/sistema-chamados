@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Detalhes da Categoria</h1>

    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
        <p class="text-gray-800 dark:text-gray-200"><strong>ID:</strong> {{ $categoria->id }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Nome:</strong> {{ $categoria->nome }}</p>
    </div>

    <div class="mt-4 space-x-2">
        <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">Voltar</a>
        <a href="{{ route('categorias.edit', $categoria) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">Editar</a>
    </div>
</div>
@endsection
