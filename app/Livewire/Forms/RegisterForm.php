<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Form
{
    #[Validate('required|string|min:3|max:250')]
    public string $name;

    #[Validate('required|email|max:250|unique:users,email')]
    public string $email;

    #[Validate('required|string|min:8|confirmed')]
    public string $password;

    public string $password_confirmation;
    
    public function store(){
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        Auth::attempt($credentials);

        return to_route('dashboard');
    }
}
