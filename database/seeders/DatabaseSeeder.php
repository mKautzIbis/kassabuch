<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Category::create([
            'name' => 'nicht definiert',
            'color' => '#AAAAAA',
        ]);
        Category::factory(5)->create();
        Transaction::factory(50)->create();
    }
}
