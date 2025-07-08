<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('welcome');
Route::get('home', Home::class)->name('home');
