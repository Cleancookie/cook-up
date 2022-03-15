<?php

namespace App\Actions;

use App\Models\Recipe;
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
        $recipes = collect($recipeFiles)
            ->map(fn ($filePath) => Storage::get($filePath))
            ->map(fn ($file) => json_decode($file, false, 512, JSON_THROW_ON_ERROR))
            ->tap(function ($recipes) {
                Recipe::query()->upsert($recipes->map(function ($recipe) {
                    return [
                        'name' => $recipe->title,
                        'description' => $recipe->description,
                        'source' => Recipe::SOURCE_GOUSTO,
                        'source_id' => $recipe->gousto_id,
                    ];
                })->toArray(), ['source', 'source_id']);
            })
        ;

    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Done!');
    }
}
