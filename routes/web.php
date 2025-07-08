<?php

use App\Livewire\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::post('logout', LogoutController::class)->name('logout');
});


Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');