<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Trial Assignment')]
#[Layout('layouts.trial')]
class TrialPage extends Component
{
    public function render()
    {
        return view('livewire.trial-page');
    }
}
