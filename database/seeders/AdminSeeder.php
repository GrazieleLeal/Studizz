<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Graziele',
            'papel_id' => 1,
            'email' => 'email.teste@gmail.com',
            'password' => '$2y$12$23F.0Zgk/budkizN5A0Vq.YqqFk1TOVuq9uB6lyE2ntuESqs.6Fpe'
        ]);
    }
}
