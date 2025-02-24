<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Perfil') }}
        </h2>
    </x-slot>

    @section('content') <!-- Começando a seção 'content' -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                Bem-vindo ao painel de edição do perfil.
            </h3>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Nome:</strong> {{ $user->nome }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Perfil:</strong> {{ $user->perfil->nome }}</p>
            </div>
        </div>
    </div>
    @endsection <!-- Fechando a seção 'content' -->
</x-app-layout>
