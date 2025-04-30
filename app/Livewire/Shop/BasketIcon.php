<?php

namespace App\Livewire\Shop;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class BasketIcon extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];
    public function render()
    {
        return view('livewire.shop.basket-icon',
        [
            'cartCount' => Cart::count(),
            'cartTotal' => Cart::total()
        ]);
    }
}
