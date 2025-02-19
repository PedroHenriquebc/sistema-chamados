<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        $adminPerfil = Perfil::where('nome', 'Admin')->first();

        Usuario::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'nome'      => 'Admin',
                'password'  => Hash::make('admin123'),
                'perfil_id' => $adminPerfil->id,
            ]
        );
    }
}
