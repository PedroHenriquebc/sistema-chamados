@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg mt-5 text-center">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Detalhes do Perfil</h1>
    <p class="text-gray-700 dark:text-gray-300"><strong>ID:</strong> {{ $perfil->id }}</p>
    <p class="text-gray-700 dark:text-gray-300"><strong>Nome:</strong> {{ $perfil->nome }}</p>
    <a href="{{ route('perfis.index') }}" class="px-4 py-2 mt-4 inline-block bg-gray-500 text-white rounded-lg hover:bg-gray-600">Voltar</a>
</div>
@endsection
