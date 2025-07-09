<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class BadgesDisplay extends Component
{
    public Collection $badges;

    /**
     * Mount the component and load the initial badges.
     */
    public function mount()
    {
        $this->refreshBadges();
    }

    #[On('taskCompleted')]
    public function refreshBadges()
    {
        $this->badges = Auth::user()->fresh()->badges;
    }

    public function render()
    {
        return view('livewire.dashboard.badges-display');
    }
}
