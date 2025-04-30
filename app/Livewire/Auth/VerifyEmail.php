<?php

namespace App\Livewire\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmail extends Component
{
    public $email;

    public function mount()
    {
        $this->email = Auth::user()->email;
    }

    public function verificationRequest (EmailVerificationRequest $request) {
        $request->fulfill();
     
        return redirect('/');
    }

    public function verificationNotification(Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    public function render()
    {
        return view('livewire.auth.verify-email',['email' => $this->email])->layout('layouts.app');
    }
}
