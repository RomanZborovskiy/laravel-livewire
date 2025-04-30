<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Registration;

Route::get('/logout', [Login::class,'logout'])->name('logout');

Route::get('/email/verify', VerifyEmail::class)->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerifyEmail::class, 'verificationRequest'])
->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', [VerifyEmail::class, 'verificationNotification'])
->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//

Route::middleware('guest')->group(function(){
    Route::get('/registration', Registration::class)->name('registration');
    Route::get('/login', Login::class,)->name('login');

    Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::post('/forgot-password', [ForgotPassword::class, 'forgotPassword'])->name('password.email');
    Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
    Route::post('/reset-password', [ResetPassword::class, 'resetPassword'])->name('password.update');
});