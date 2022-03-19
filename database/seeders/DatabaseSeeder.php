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
         \App\Models\User::factory(10)->create();
        User::factory()->create(['name' => 'Test', 'email' => 'test@test.com']);
        $tags = Tag::factory()->count(10)->create();
        $ingredients = Ingredient::factory()->count(100)->create();

        for ($i = 0; $i < 50; $i++) {
            \App\Models\Recipe::factory()
                ->hasAttached($tags->random(random_int(1, 3)))
                ->hasAttached($ingredients->random(random_int(5, 12)))
                ->create();
        }
//        ImportGousto::make()->run();
    }
}
