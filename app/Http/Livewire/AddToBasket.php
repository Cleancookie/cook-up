<?php

namespace App\Http\Livewire;

use App\Models\Basket;
use App\Models\Recipe;
use Livewire\Component;

class AddToBasket extends Component
{
    public Recipe $recipe;

    public function render()
    {
        return view('livewire.add-to-basket');
    }

    public function addToBasket(Recipe $recipe)
    {
        \App\Actions\AddToBasket::run($recipe);

        $this->emit(Basket::BASKET_UPDATED_EVENT);
    }
}
