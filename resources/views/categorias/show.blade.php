@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center p-6">
    <div class="w-full max-w-2xl p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Detalhes da Categoria</h1>

        <div class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg shadow-md">
            <p class="text-gray-900 dark:text-gray-300"><strong>ID:</strong> {{ $categoria->id }}</p>
            <p class="text-gray-900 dark:text-gray-300"><strong>Nome:</strong> {{ $categoria->nome }}</p>
            <p class="text-gray-900 dark:text-gray-300"><strong>Perfil:</strong> {{ $categoria->perfil->nome }}</p>
        </div>

        <div class="mt-6 flex justify-center space-x-4">
            <a href="{{ route('categorias.edit', $categoria) }}"
               class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 transition">
                Editar
            </a>
            <a href="{{ route('categorias.index') }}"
               class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition">
                Voltar
            </a>
        </div>
    </div>
</div>
@endsection
