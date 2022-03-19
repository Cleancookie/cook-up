<?php

namespace App\Http\Livewire;

use App\Models\Basket;
use Livewire\Component;
use function view;

class NavBasket extends Component
{
    public Basket $basket;

    public function mount()
    {
        $this->basket = auth()->user()?->baskets()->orderByDesc('created_at')->first();
    }

    public function render()
    {
        return view('livewire.nav-basket');
    }
}
