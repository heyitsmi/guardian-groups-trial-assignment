<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class GuardianGroupInfo extends Component
{
    public Collection $groups;

    public function mount()
    {
        $this->groups = Auth::user()->groups()->with('members')->get();
    }

    public function render()
    {
        return view('livewire.dashboard.guardian-group-info');
    }
}