<x-app-layout>
    @section('content')
    <div class="flex justify-center items-center p-4">
        <div class="w-full max-w-2xl p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg text-center">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Detalhes do Usuário</h1>

            <div class="mb-6 text-left">
            <p class="text-gray-900 dark:text-gray-300"><strong>ID:</strong> {{ $usuario->id }}</p>
            </div>

            <div class="mb-6 text-left">
            <p class="text-gray-900 dark:text-gray-300"><strong>Nome:</strong> {{ $usuario->nome }}</p>
            </div>

            <div class="mb-6 text-left">
            <p class="text-gray-900 dark:text-gray-300"><strong>Email:</strong> {{ $usuario->email }}</p>
            </div>

            <div class="mb-6 text-left">
            <p class="text-gray-900 dark:text-gray-300"><strong>Perfil:</strong> {{ $usuario->perfil->nome }}</p>
            </div>

            <div class="flex justify-center space-x-4">
                <a href="{{ route('usuarios.edit', $usuario->id) }}"
                   class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 transition">
                    Editar
                </a>
                <a href="{{ route('usuarios.index') }}"
                   class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition">
                    Voltar
                </a>
            </div>
        </div>
    </div>
    @endsection
</x-app-layout>
