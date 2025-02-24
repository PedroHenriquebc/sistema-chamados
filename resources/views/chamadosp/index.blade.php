@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200">Lista de Perfis</h1>

    @if (session('success'))
        <div class="mb-4 text-green-500">{{ session('success') }}</div>
    @endif

    <div class="flex justify-between mb-4">
        <a href="{{ route('chamadosp.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">Criar Perfil</a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                    <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">ID</th>
                    <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">Nome</th>
                    <th class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($perfis as $perfil)
                <tr class="bg-white dark:bg-gray-700">
                    <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $perfil->id }}</td>
                    <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $perfil->nome }}</td>
                    <td class="py-2 px-4 border dark:border-gray-600 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('chamadosp.show', $perfil->id) }}" class="text-blue-500 dark:text-blue-300">Ver</a>
                            <a href="{{ route('chamadosp.edit', $perfil->id) }}" class="text-green-500 dark:text-green-300">Editar</a>
                            <form action="{{ route('chamadosp.destroy', $perfil->id) }}" method="POST" class="inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 dark:text-red-300">Excluir</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-6 space-x-2 flex justify-center">
            <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
                Voltar
            </a>
        </div>
    </div>
</div>
@endsection
