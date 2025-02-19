<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            ['nome' => 'Suporte Técnico', 'perfil_id' => 3],
            ['nome' => 'Desenvolvimento', 'perfil_id' => 2],
            ['nome' => 'Financeiro', 'perfil_id' => 4],
            ['nome' => 'Recursos Humanos', 'perfil_id' => 4],
        ];

        foreach ($categorias as $categoria) {
            Categoria::firstOrCreate(['nome' => $categoria['nome']], $categoria);
        }
    }
}
