<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;

class Login extends Component
{
    #[Validate('required|min:3')] 
    public $email ='';

    #[Validate('required|min:3')] 
    public $password ='';

    public function login(Request $request){

        $user = $this->validate();

        if(Auth::attempt($user)) {
            $request->session()->regenerate();
        }
        return redirect('/');

    }

    public function logout() {
        auth()->logout();
        return redirect()->intended('registration');
    }
    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}
