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
        $file = Storage::disk('local')->get('recipes/gousto.json');
        $recipes = collect(json_decode($file));

        $recipes->map(function ($recipe) {
            return Recipe::make([
                'name' => $recipe->title,
                'description' => $recipe->description,
                'source' => Recipe::SOURCE_GOUSTO,
                'source_id' => $recipe->gousto_id,
            ])->save();
        });
    }

    public function asCommand(Command $command): void
    {
        $this->handle();

        $command->info('Done!');
    }
}
