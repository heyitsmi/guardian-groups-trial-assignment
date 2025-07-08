<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginForm extends Form
{
    #[Validate('required')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    #[Validate('nullable')]
    public $remember = '';
    
    public function store(){
        $this->validate();

        if (Auth::attempt($this->validate())) {
            return to_route('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records'
        ]);
    }
}
