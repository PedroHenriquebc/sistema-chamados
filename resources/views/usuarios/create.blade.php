<x-app-layout>
    @section('content')
    <div class="flex justify-center items-center p-4">
        <div class="w-full max-w-2xl p-8 bg-white dark:bg-gray-800 shadow-md rounded-lg text-center">
            <h1 class="text-2xl font-bold mb-6 text-gray-800 dark:text-gray-200">Criar Novo Usuário</h1>

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf

                <!-- Nome do Usuário -->
                <div class="mb-6 text-left">
                    <label for="nome" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Nome</label>
                    <input type="text" id="nome" name="nome"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white
                        @error('nome') border-red-500 @enderror"
                        value="{{ old('nome') }}" required>
                    @error('nome')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- E-mail do Usuário -->
                <div class="mb-6 text-left">
                    <label for="email" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">E-mail</label>
                    <input type="email" id="email" name="email"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white
                        @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Senha do Usuário -->
                <div class="mb-6 text-left">
                    <label for="senha" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Senha</label>
                    <input type="password" id="senha" name="password"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white
                        @error('password') border-red-500 @enderror"
                        required>
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Seleção de Perfil -->
                <div class="mb-6 text-left">
                    <label for="perfil_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Perfil</label>
                    <select name="perfil_id" id="perfil_id"
                        class="w-full p-3 border border-gray-300 dark:border-gray-600 rounded-lg dark:bg-gray-700 dark:text-white
                        @error('perfil_id') border-red-500 @enderror"
                        required>
                        <option value="" disabled selected>Selecione um Perfil</option>
                        @foreach($perfis as $perfil)
                            <option value="{{ $perfil->id }}" {{ old('perfil_id') == $perfil->id ? 'selected' : '' }}>
                                {{ $perfil->nome }}
                            </option>
                        @endforeach
                    </select>
                    @error('perfil_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botões de Ação -->
                <div class="flex justify-center space-x-4">
                    <button type="submit"
                        class="px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-500 transition">
                        Criar Usuário
                    </button>
                    <a href="{{ route('usuarios.index') }}"
                        class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 dark:bg-gray-600 dark:hover:bg-gray-500 transition">
                        Voltar
                    </a>
                </div>
            </form>
        </div>
    </div>
    @endsection
</x-app-layout>
