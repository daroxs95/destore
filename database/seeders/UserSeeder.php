<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
        User::create([
            'name' => 'Daro',
            'email' => 'daro@daro.com',
            'password' => '$2y$12$NcMAoaOmrpeQ124puIArRuEz8C35sBWw3e5YlsYZYO7ixpNaa7Qzi',
            'is_admin' => true,
        ]);
    }
}
