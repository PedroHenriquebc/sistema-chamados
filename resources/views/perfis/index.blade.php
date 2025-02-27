@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg mt-5">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 text-center">Lista de Perfis</h1>
    <div class="mb-4 flex justify-between">
        <a href="{{ route('perfis.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">
            Novo Perfil
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <!-- <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">ID</th> -->
                    <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">Nome</th>
                    <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perfis as $perfil)
                <tr class="bg-white dark:bg-gray-700 text-center">
                    <!-- <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $perfil->id }}</td> -->
                    <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $perfil->nome }}</td>
                    <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">
                        <div class="flex justify-center gap-4">
                            <a href="{{ route('perfis.show', $perfil) }}" class="text-blue-500 hover:text-blue-500 dark:text-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 2v20l2-1 2 1 2-1 2 1 2-1 2 1 2-1 2 1V2l-2 1-2-1-2 1-2-1-2 1-2-1-2 1Z"/>
                                    <path d="M14 8H8"/><path d="M16 12H8"/><path d="M13 16H8"/>
                                </svg>
                            </a>
                            <a href="{{ route('perfis.edit', $perfil) }}" class="text-green-500 hover:text-green-500 dark:text-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.862 3.487a3 3 0 0 1 4.243 4.243L8.5 20.5l-5.5 1l1-5.5z" />
                                </svg>
                            </a>
                            <form action="{{ route('perfis.destroy', $perfil) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-500 dark:text-red-300" onclick="return confirm('Tem certeza que deseja excluir?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7L5 7M10 11v6m4-6v6m-7 5h10a2 2 0 0 0 2-2V7H5v12a2 2 0 0 0 2 2zM9 7V4h6v3" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-6 space-x-2 flex justify-center">
            <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
                Voltar
            </a>
        </div>
</div>
@endsection
