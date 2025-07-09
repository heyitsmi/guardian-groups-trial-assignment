<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Badge extends Component
{
    #[Title('Badges')] 

    public function render()
    {
        return view('livewire.badge');
    }
}
