<?php

namespace App\Http\Livewire\Recipes;

use App\Models\Recipe;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.recipes.index', [
            'recipes' => Recipe::with('tags')->paginate(),
        ]);
    }
}
