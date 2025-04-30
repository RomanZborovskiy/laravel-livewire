<?php

namespace App\Livewire\Auth;

use Livewire\Component;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class ResetPassword extends Component
{   
    #[Validate('required')]
    public string $token ='';

    #[Validate('required|email')]
    public $email ='';

    #[Validate('required|min:3')]
    public $password ='';

    public function mount(string $token)
    {
        $this->token = $token;
    }
    
    public function resetPassword()  {
        $this->validate();
        
        $status = Password::reset(
            $this->only(['email', 'password', 'password_confirmation', 'token']),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
                
     
                event(new PasswordReset($user));
            }
        );

     
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('status', __($status));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password', ['token' => $this->token])->layout('layouts.app');
    }
}
