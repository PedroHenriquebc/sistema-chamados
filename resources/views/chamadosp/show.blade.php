@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Detalhes do Perfil</h1>

    <div class="bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
        <p class="text-gray-800 dark:text-gray-200"><strong>ID:</strong> {{ $perfil->id }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Nome:</strong> {{ $perfil->nome }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Descrição:</strong> {{ $perfil->descricao }}</p>
    </div>

    
</div>
@endsection
