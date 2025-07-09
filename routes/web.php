<?php

use App\Livewire\Home;
use App\Livewire\Badge;
use App\Livewire\Profile;
use App\Livewire\Dashboard;
use App\Livewire\TrialPage;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\GuardianGroups\Search as GuardianGroupSearch;

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function(){
    Route::get('trial',TrialPage::class)->name('trial');
    
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('profile',Profile::class)->name('profile');
    Route::get('badges',Badge::class)->name('badges');

    Route::get('groups/search', GuardianGroupSearch::class)->name('groups.search');

    Route::post('logout', LogoutController::class)->name('logout');
});


Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');