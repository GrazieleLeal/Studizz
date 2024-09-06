<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create([
            'descricao' => 'Biologia',
        ]);
        Categoria::create([
            'descricao' => 'Química',
        ]);
        Categoria::create([
            'descricao' => 'Física',
        ]);
        Categoria::create([
            'descricao' => 'Matemática',
        ]);
        Categoria::create([
            'descricao' => 'Português',
        ]);
        Categoria::create([
            'descricao' => 'Inglês',
        ]);
        Categoria::create([
            'descricao' => 'História',
        ]);
        Categoria::create([
            'descricao' => 'Geografia',
        ]);
        Categoria::create([
            'descricao' => 'Sociologia',
        ]);

    }
}
