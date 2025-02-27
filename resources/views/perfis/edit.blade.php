@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg mt-5 text-center">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Editar Perfil</h1>
    <form action="{{ route('perfis.update', $perfil) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 dark:text-gray-300">Nome do Perfil</label>
            <input type="text" id="nome" name="nome" value="{{ $perfil->nome }}" class="w-full p-2 border border-gray-300 dark:border-gray-600 rounded-lg" required>
        </div>
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Atualizar</button>
        <a href="{{ route('perfis.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Voltar</a>
    </form>
</div>
@endsection
