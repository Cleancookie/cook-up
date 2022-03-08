<?php

namespace App\Http\Livewire\Recipes;

use App\Models\Recipe;
use Livewire\Component;

class Index extends Component
{
    public $recipes;

    public function mount()
    {
        $this->recipes = Recipe::all();
    }

    public function render()
    {
        return view('livewire.recipes.index');
    }
}
