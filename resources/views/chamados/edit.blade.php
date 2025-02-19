@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Editar Chamado</h1>

    <div class="bg-white p-4 rounded shadow-md">
        <form action="{{ route('chamados.update', $chamado) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700">Título</label>
                <input type="text" name="titulo" value="{{ $chamado->titulo }}" class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Descrição</label>
                <textarea name="descricao" class="w-full p-2 border rounded">{{ $chamado->descricao }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Categoria</label>
                <select name="categoria_id" class="w-full p-2 border rounded">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $chamado->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700">Status</label>
                <select name="status" class="w-full p-2 border rounded">
                    <option value="Aberto" {{ $chamado->status == 'Aberto' ? 'selected' : '' }}>Aberto</option>
                    <option value="Em andamento" {{ $chamado->status == 'Em andamento' ? 'selected' : '' }}>Em andamento</option>
                    <option value="Fechado" {{ $chamado->status == 'Fechado' ? 'selected' : '' }}>Fechado</option>
                </select>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded">Salvar</button>
                <a href="{{ route('chamados.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
