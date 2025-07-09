<?php

namespace App\Livewire\Dashboard;

use App\Models\Mission;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class MissionsDisplay extends Component
{
    public $missions;

    public function mount()
    {
        $this->loadMissions();
    }

    #[On('taskCompleted')]
    public function loadMissions()
    {
        $user = Auth::user();
        $completedMissionIds = $user->completedMissions()->pluck('missions.id')->toArray();

        $this->missions = Mission::whereNotIn('id', $completedMissionIds)
                                 ->take(2)
                                 ->get();
    }

    public function render()
    {
        return view('livewire.dashboard.missions-display');
    }
}
