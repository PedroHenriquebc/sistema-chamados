@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Criar Status</h1>

    <form action="{{ route('status.store') }}" method="POST">
        @csrf
        <label for="nome" class="block">Nome do Status</label>
        <input type="text" name="nome" id="nome" class="w-full border p-2 rounded-lg" required>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">Salvar</button>
    </form>
</div>
@endsection
