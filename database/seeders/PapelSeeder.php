<?php

namespace Database\Seeders;

use App\Models\Papel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Papel::create([
            'descricao' => 'admin',
        ]);
        Papel::create([
            'descricao' => 'comum',
        ]);
    }
}
