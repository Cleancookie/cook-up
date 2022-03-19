<?php

namespace App\Http\Livewire;

use App\Models\Basket;
use Livewire\Component;

class BasketWire extends Component
{
    public Basket|null $basket;

    protected $listeners = [
        Basket::BASKET_UPDATED_EVENT => 'loadBasket'
    ];

    public function mount()
    {
        $this->loadBasket();
    }

    public function loadBasket()
    {
        $this->basket = auth()->user()->basket;

        if (!empty($this->basket)) {
            $this->basket->loadMissing('recipes');
        }
    }

    public function render()
    {
        return view('livewire.basket-wire');
    }

    public function removeFromBasket($pivotId)
    {
        $pivot = $this->basket->recipes->pluck('pivot')->firstWhere('id', $pivotId);
        if ($pivot) {
            $pivot->delete();
        }

        $this->emit(Basket::BASKET_UPDATED_EVENT);
    }
}
