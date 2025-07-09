<?php

namespace App\Livewire;

use App\Models\Badge as BadgeModel; // Use an alias to avoid class name conflict
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Auth;

class Badge extends Component
{
    #[Title("Your Badges")] 

    public function render()
    {
        $allBadges = BadgeModel::orderBy('required_points')->get();

        $userBadgeIds = Auth::user()->badges()->pluck('badges.id')->toArray();

        [$earnedBadges, $lockedBadges] = $allBadges->partition(function ($badge) use ($userBadgeIds) {
            return in_array($badge->id, $userBadgeIds);
        });
        return view('livewire.badge', [
            'earnedBadges' => $earnedBadges,
            'lockedBadges' => $lockedBadges,
        ]);
    }
}
