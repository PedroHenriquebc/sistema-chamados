@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Abrir Chamado</h1>
    <form action="{{ route('chamados.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="titulo" class="block font-bold">Título:</label>
            <input type="text" name="titulo" id="titulo" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label for="descricao" class="block font-bold">Descrição:</label>
            <textarea name="descricao" id="descricao" class="border p-2 w-full" required></textarea>
        </div>
        <div class="mb-4">
            <label for="categoria_id" class="block font-bold">Categoria:</label>
            <select name="categoria_id" id="categoria_id" class="border p-2 w-full" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Abrir Chamado</button>
    </form>
</div>
@endsection
