<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class OneProduct extends Component
{
    public $product;
    public $quantity = 1;


    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
    }

    public function addToCart()
    {
        Cart::add([
            'id' => (int)$this->product->id,
            'name' => $this->product->name,
            'qty' => $this->quantity,
            'price' => $this->product->price,
            
        ]);
        
        $this->dispatch('cartUpdated');
        session()->flash('message', 'Product is added!');
    }

    public function render()
    {
        return view('livewire.shop.one-product')->layout('layouts.app');
    }
}
