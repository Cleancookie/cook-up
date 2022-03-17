<?php

namespace App\Actions;

use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Lorisleiva\Actions\Concerns\AsAction;
use function dump;

class ImportGousto
{
    use AsAction;

    public string $commandSignature = 'import:gousto';

    public string $commandDescription = 'Import from a Gousto JSON file';

    public function handle()
    {
        $recipeFiles = Storage::allFiles('recipes');
        $inputs = collect($recipeFiles)
            ->map(fn ($filePath) => Storage::get($filePath))
            ->map(fn ($file) => json_decode($file, false, 512, JSON_THROW_ON_ERROR));

        // Import recipes
        $recipes = $inputs
            ->map(function ($input) {
                $recipe = Recipe::query()
                    ->firstOrCreate([
                        'source' => Recipe::SOURCE_GOUSTO,
                        'source_id' => $input->gousto_id,
                    ], [
                        'name' => $input->title,
                        'description' => $input->description,
                    ]);
                return ['recipe' => $recipe, 'raw' => $input];
            })
            ->map(function ($input) {
                $tags = collect([...collect($input['raw']?->categories)->pluck('title'), $input['raw']?->cuisine?->title])
                    ->filter()->unique()
                    ->map(function($tag) {
                        return Tag::firstOrCreate(['name' => $tag]);
                    });

                $input['recipe']->tags()->sync($tags->pluck('id'));

                return ['tags' => $tags] + $input;
            })
            ->map(function ($input) {
                $ingredients = collect($input['raw']?->ingredients)->map(function ($ingredient) {
                    return Ingredient::firstOrCreate(['name' => $ingredient->name]);
                });

                $input['recipe']->ingredients()->sync($ingredients->pluck('id'));

                return ['ingredients' => $ingredients] + $input;
            })
        ;
    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Done!');
    }
}
