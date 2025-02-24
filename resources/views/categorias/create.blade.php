@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Criar Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 dark:text-gray-300">Nome da Categoria</label>
            <input type="text" id="nome" name="nome" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">Criar Categoria</button>
    </form>
</div>
@endsection
