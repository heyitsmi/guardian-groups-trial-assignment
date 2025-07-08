<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\RegisterForm;

class Register extends Component
{
    #[Title('Register')]

    #[Layout('layouts.auth')]

    public RegisterForm $form;

    public function register()
    {
        $this->form->store();
    }

    public function render()
    {
        sleep(2);
        return view('livewire.auth.register');
    }
}
