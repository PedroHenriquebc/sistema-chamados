@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center p-6">
    <div class="w-full max-w-2xl p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200 text-center">Editar Categoria</h1>

        <form action="{{ route('categorias.update', $categoria) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="nome" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Nome da Categoria</label>
                <input type="text" id="nome" name="nome" value="{{ old('nome', $categoria->nome) }}"
                       class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white" required>
            </div>

            <div class="mb-6">
                <label for="perfil_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Perfil</label>
                <select id="perfil_id" name="perfil_id"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white" required>
                    @foreach($perfis as $perfil)
                        <option value="{{ $perfil->id }}" {{ $categoria->perfil_id == $perfil->id ? 'selected' : '' }}>
                            {{ $perfil->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-center space-x-4">
                <button type="submit"
                        class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-500 transition">
                    Atualizar Categoria
                </button>
                <a href="{{ route('categorias.index') }}"
                   class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition">
                    Voltar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
