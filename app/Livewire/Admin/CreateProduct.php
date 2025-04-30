<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

use Livewire\Attributes\Validate;
use function PHPUnit\Framework\returnArgument;

class CreateProduct extends Component
{
    #[Validate('required|min:3')] 
    public $name = '';

    #[Validate('required|min:3')] 
    public $description = '';

    #[Validate('required|decimal:2')] 
    public $price = '';
    
    #[Validate('boolean')] 
    public $status = '0';

    #[Validate('required|min:3')] 
    public $image = '';

    public function create(){

        $this->validate();

        Product::create($this->all());

        return redirect('admin/create-product')->with('success', 'Product created');

    }
    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.app');
    }
}
