<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\LoginForm;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Attributes\Title;

class Login extends Component
{
    #[Title('Login')]

    #[Layout('layouts.auth')]

    public LoginForm $form;

    public function login()
    {
        $this->form->store();
    }

    public function render()
    {
        sleep(2);
        
        return view('livewire.auth.login');
    }
}
