<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    public function run()
    {
        $status = ['Aberto', 'Em Desenvolvimento', 'Fechado'];

        foreach ($status as $s) {
            Status::firstOrCreate(['nome' => $s]);
        }
    }
}
