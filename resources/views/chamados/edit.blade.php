@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md mt-5">
    <h1 class="text-2xl font-bold mb-4 text-gray-800 dark:text-gray-200 text-center">Editar Chamado</h1>

    <form action="{{ route('chamados.update', $chamado) }}" method="POST">
        @csrf
        @method('PUT')

        @php
            $isDisabled = auth()->user()->perfil->nome === 'Comum' && auth()->id() !== $chamado->usuario_id;
            $isJustCommom = auth()->user()->perfil->nome === 'Comum';
        @endphp

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Título</label>
            <input type="text" name="titulo" value="{{ $chamado->titulo }}" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white
                @if($isDisabled) cursor-not-allowed bg-gray-300 text-gray-500 @endif"
                @if($isDisabled) disabled @endif>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Descrição</label>
            <textarea name="descricao" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white
                @if($isDisabled) cursor-not-allowed bg-gray-300 text-gray-500 @endif"
                @if($isDisabled) disabled @endif>{{ $chamado->descricao }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Categoria</label>
            <select name="categoria_id" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white
                @if($isDisabled) cursor-not-allowed bg-gray-300 text-gray-500 @endif"
                @if($isDisabled) disabled @endif>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $chamado->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-200">Status</label>
            <select name="status_id" class="w-full p-2 border rounded dark:bg-gray-700 dark:text-white
                @if($isJustCommom) cursor-not-allowed bg-gray-300 text-gray-500 @endif"
                @if($isJustCommom) disabled @endif>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}" {{ $chamado->status_id == $status->id ? 'selected' : '' }}>
                        {{ $status->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-center space-x-3">
            <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600
                @if($isDisabled) cursor-not-allowed bg-gray-500 @endif"
                @if($isDisabled) disabled @endif>
                Salvar
            </button>
            <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
