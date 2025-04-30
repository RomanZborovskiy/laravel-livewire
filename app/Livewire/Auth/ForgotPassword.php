<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Livewire\Component;
use Livewire\Attributes\Validate;

class ForgotPassword extends Component

{   #[Validate('required|email')]
    public $email ='';
    public function forgotPassword(){
        $mail=$this->validate();
 
        $status = Password::sendResetLink($mail);
     
        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('password.request')->with('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->layout('layouts.app');
    }
}
