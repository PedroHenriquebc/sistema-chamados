<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perfil;

class PerfilSeeder extends Seeder
{
    public function run()
    {
        $perfis = ['Admin', 'Desenvolvedor', 'Infraestrutura', 'Comum'];

        foreach ($perfis as $perfil) {
            Perfil::firstOrCreate(['nome' => $perfil]);
        }
    }
}
