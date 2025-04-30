<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Auth\Events\Registered;

class Registration extends Component
{
    #[Validate('required|min:3')] 
    public $name ='';

    #[Validate('required|min:3')] 
    public $email = '';

    #[Validate('required|min:3')] 
    public $password = '';

    public function save(){

        $this->validate();

        $user = User::create($this->only(['name', 'email', 'password']));

        auth()->login($user);

        event(new Registered($user));

        return redirect('/email/verify');
    }
    public function render()
    {
        return view('livewire.auth.registration')->layout('layouts.app');
    }
}
