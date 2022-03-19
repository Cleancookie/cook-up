<?php

namespace App\Http\Livewire;

use App\Models\Basket;
use Livewire\Component;
use function view;

class NavBasket extends Component
{
    public ?Basket $basket;

    protected $listeners = [
        Basket::BASKET_UPDATED_EVENT => 'loadBasket'
    ];

    public function mount()
    {
        $this->loadBasket();
    }

    public function render()
    {
        return view('livewire.nav-basket');
    }

    public function loadBasket()
    {
        $this->basket = auth()->user()?->basket;
    }
}
