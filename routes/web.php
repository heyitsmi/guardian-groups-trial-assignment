<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::get('home', Home::class)->name('home');

Route::get('login', function () {
    return view('auth.login');
})->name('login');


Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::post('logout', function () {
    auth()->logout();
    return redirect()->route('welcome');
})->name('logout');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');