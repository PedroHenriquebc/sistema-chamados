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
        $comumPerfil = Perfil::where('nome', 'Comum')->first();
        $infraPerfil = Perfil::where('nome', 'Infraestrutura')->first();
        $devPerfil = Perfil::where('nome', 'Desenvolvedor')->first();

        Usuario::firstOrCreate(
            ['email' => 'admin@email.com'],
            [
                'nome'      => 'Admin',
                'password'  => Hash::make('admin123'),
                'perfil_id' => $adminPerfil->id,
            ]
        );

        Usuario::firstOrCreate(
            ['email' => 'comum@email.com'],
            [
                'nome'      => 'Marcos',
                'password'  => Hash::make('comum123'),
                'perfil_id' => $comumPerfil->id,
            ]
        );

        Usuario::firstOrCreate(
            ['email' => 'dev@email.com'],
            [
                'nome'      => 'Pedro',
                'password'  => Hash::make('dev123'),
                'perfil_id' => $devPerfil->id,
            ]
        );

        Usuario::firstOrCreate(
            ['email' => 'infra@email.com'],
            [
                'nome'      => 'Diego',
                'password'  => Hash::make('infra123'),
                'perfil_id' => $infraPerfil->id,
            ]
        );
    }
}
