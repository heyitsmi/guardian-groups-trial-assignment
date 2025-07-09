<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class PointsCounter extends Component
{
    public int $points = 0;

    /**
     * Mount the component and load the initial points.
     */
    public function mount()
    {
        $this->refreshPoints();
    }

    #[On('taskCompleted')]
    public function refreshPoints()
    {
        $this->points = Auth::user()->fresh()->points;
    }

    public function render()
    {
        return view('livewire.dashboard.points-counter');
    }
}
