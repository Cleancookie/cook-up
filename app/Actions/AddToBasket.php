<?php

namespace App\Actions;

use App\Models\Basket;
use App\Models\Recipe;
use Lorisleiva\Actions\Concerns\AsAction;

class AddToBasket
{
    use AsAction;

    public Basket $basket;

    public function __construct()
    {
        $this->basket = $this->basket ?? auth()->user()?->basket ?? Basket::create(['owned_by' => auth()->user()->id]);
    }

    public function handle(Recipe $recipe)
    {
        $this->basket->recipes()->attach($recipe->id);

        return $this;
    }
}
