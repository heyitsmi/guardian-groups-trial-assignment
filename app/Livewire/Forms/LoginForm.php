<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginForm extends Form
{
    #[Validate('required|email')]
    public string $email = '';

    #[Validate('required')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;
    
    public function store(){
        $this->validate();

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // If authentication fails, throw an exception.
            throw ValidationException::withMessages([
                'form.email' => 'The provided credentials do not match our records.',
            ]);
        }
        
        request()->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}
