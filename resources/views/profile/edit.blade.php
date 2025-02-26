<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    @section('content')
    <div class="py-12 flex justify-center items-center">
        <div class="max-w-4xl w-full mx-auto sm:px-6 lg:px-8 space-y-6 text-center">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
                Dados Pessoais
            </h3>

            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg text-center">
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Nome:</strong> {{ $user->nome }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300"><strong>Perfil:</strong> {{ $user->perfil->nome }}</p>
            </div>

            <!-- Botão de Voltar Centralizado -->
            <div class="mt-6">
                <a href="{{ route('chamados.index') }}"
                   class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
                    ← Voltar
                </a>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
