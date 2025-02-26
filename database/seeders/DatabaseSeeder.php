<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
{
    $this->call([
        PerfilSeeder::class,
        UsuarioSeeder::class,
        ChamadoSeeder::class,
        CategoriaSeeder::class,
        StatusSeeder::class,
        // Adicione outros seeders se houver, como CategoriaSeeder e ChamadoSeeder
    ]);
}
}
