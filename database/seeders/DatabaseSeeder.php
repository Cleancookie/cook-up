<?php

namespace Database\Seeders;

use App\Actions\ImportGousto;
use App\Models\Ingredient;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory()->create(['name' => 'Test', 'email' => 'test@test.com']);
         \App\Models\Recipe::factory(100)
             ->has(Tag::factory()->count(2))
             ->has(Ingredient::factory()->count(10))
             ->create();
//        ImportGousto::make()->run();
    }
}
