<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class Home extends Component
{    
    public function render()
    {
        return view('livewire.home')->layout('layouts.app');
    }
}
