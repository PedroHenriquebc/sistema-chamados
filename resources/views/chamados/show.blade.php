@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg mt-5">
    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100 text-center">Detalhes do Chamado</h1>

    <div class="space-y-4">
        <p class="text-gray-800 dark:text-gray-200"><strong>ID:</strong> {{ $chamado->id }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Título:</strong> {{ $chamado->titulo }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Descrição:</strong> {{ $chamado->descricao }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Requerente:</strong> {{ $chamado->usuario->nome }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Categoria:</strong> {{ $chamado->categoria->nome }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Data de Abertura:</strong> {{ \Carbon\Carbon::parse($chamado->data_abertura)->format('d/m/Y H:i') }}</p>
        <p class="text-gray-800 dark:text-gray-200"><strong>Status:</strong> {{ $chamado->status->nome }}</p>

        <p class="text-gray-800 dark:text-gray-200"><strong>Data de Início do Desenvolvimento:</strong>
            {{ $chamado->data_inicio_desenvolvimento ? \Carbon\Carbon::parse($chamado->data_inicio_desenvolvimento)->format('d/m/Y H:i') : 'Ainda não iniciado' }}
        </p>

        <p class="text-gray-800 dark:text-gray-200"><strong>Data de Finalização:</strong>
            {{ $chamado->data_fechamento ? \Carbon\Carbon::parse($chamado->data_fechamento)->format('d/m/Y H:i') : 'Ainda não finalizado' }}
        </p>

        <p class="text-gray-800 dark:text-gray-200"><strong>Tempo Total Aberto:</strong>
            {{ $chamado->data_inicio_desenvolvimento ? \Carbon\Carbon::parse($chamado->data_abertura)->diffInDays($chamado->data_inicio_desenvolvimento) . ' dias' : 'Ainda não iniciado' }}
        </p>

        <p class="text-gray-800 dark:text-gray-200"><strong>Tempo Início e Finalização:</strong>
            {{ $chamado->data_inicio_desenvolvimento && $chamado->data_fechamento ? \Carbon\Carbon::parse($chamado->data_inicio_desenvolvimento)->diffInDays($chamado->data_fechamento) . ' dias' : 'Ainda não finalizado' }}
        </p>
    </div>

    <div class="mt-6 space-x-2 flex justify-center">
        <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500">
            Voltar
        </a>
        <a href="{{ route('chamados.edit', $chamado) }}" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500">
            Editar
        </a>
    </div>
</div>
@endsection
