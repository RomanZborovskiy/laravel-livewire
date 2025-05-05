<?php

namespace App\Livewire\Shop;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class AllProduct extends Component
{
    use WithPagination;
    public $sortField = 'name';
    public $sortDirection = 'asc';
     

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
    }

    public function render()
    {
        $products=Product::orderBy($this->sortField, $this->sortDirection)->paginate(5);

        return view('livewire.shop.all-product',
        ['products'=>$products]
        )->layout('layouts.app');
    }
}
