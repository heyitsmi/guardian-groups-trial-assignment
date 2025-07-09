<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ImpactSummary extends Component
{
    public int $totalHelped = 0;

    public function mount()
    {
        $this->refreshImpact();
    }

    #[On('taskCompleted')]
    public function refreshImpact()
    {
        $this->totalHelped = Auth::user()->groups()->sum('people_helped_count');
    }

    public function render()
    {
        return view('livewire.dashboard.impact-summary');
    }
}
