@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Abrir Chamado</h1>
    <form action="{{ route('chamados.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="titulo" class="block font-bold text-gray-700 dark:text-gray-300">Título:</label>
            <input type="text" name="titulo" id="titulo" class="border p-2 w-full rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
        </div>
        <div class="mb-4">
            <label for="descricao" class="block font-bold text-gray-700 dark:text-gray-300">Descrição:</label>
            <textarea name="descricao" id="descricao" class="border p-2 w-full rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600" required></textarea>
        </div>
        <div class="mb-4">
            <label for="categoria_id" class="block font-bold text-gray-700 dark:text-gray-300">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="border p-2 w-full rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">Abrir Chamado</button>
        <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
            Voltar
        </a>
    </form>

</div>
@endsection
