@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center p-4">
    <div class="w-full max-w-2xl p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg text-center">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Criar Nova Categoria</h1>

        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf
            <div class="mb-6 text-left">
                <label for="nome" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Nome da Categoria</label>
                <input type="text" id="nome" name="nome" class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>
            <div class="mb-4">
                <label for="perfil_id" class="block font-bold text-gray-700 dark:text-gray-300">Perfil:</label>
                <select name="perfil_id" id="perfil_id"
                    class="border p-2 w-full rounded-lg dark:bg-gray-700 dark:text-white dark:border-gray-600"
                    required>
                    <option value="">Selecione um Perfil</option>
                    @foreach($perfis as $perfil)
                        <option value="{{ $perfil->id }}">{{ $perfil->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center space-x-4">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">
                    Criar Categoria
                </button>
                <a href="{{ route('chamados.index') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
