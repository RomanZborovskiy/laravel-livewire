<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProduct extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.shop.all-product',
        ['products'=>Product::paginate(5)]
        )->layout('layouts.app');
    }
}
