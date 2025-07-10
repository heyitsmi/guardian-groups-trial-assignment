<?php

namespace App\Livewire;

use App\Models\Badge;
use App\Models\Mission;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class HelpNowModal extends Component
{
    public bool $showModal = false;
    public $missions = [];
    
    public function mount()
    {
        $this->loadMissions();
    }

    #[On('open-help-modal')]
    public function open()
    {
        $this->loadMissions();
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function loadMissions()
    {
        $user = Auth::user();
        $completedMissionIds = $user->completedMissions()->pluck('missions.id')->toArray();

        $this->missions = Mission::whereNotIn('id', $completedMissionIds)
                                 ->inRandomOrder()
                                 ->take(3)
                                 ->get();
    }

    /**
     * Method triggered when a user completes a mission.
     */
    public function completeMission(int $missionId)
    {
        $user = Auth::user();
        $mission = Mission::find($missionId);
    
        if (!$mission) {
            return;
        }
    
        $user->completedMissions()->attach($missionId);
        $user->addPoints($mission->points_reward);
    
        foreach ($user->groups as $group) {
            $group->increment('people_helped_count');
        }
        
        $this->close();
        
        // Check for a new badge and get the message
        $badgeMessage = $this->awardBadges($user);
    
        // If a new badge was awarded, show the badge toast
        if ($badgeMessage) {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => $badgeMessage
            ]);
        } 
        // Otherwise, show the default mission completion toast
        else {
            $this->dispatch('show-toast', [
                'type' => 'success',
                'message' => 'Mission completed! You\'ve earned ' . $mission->points_reward . ' points.'
            ]);
        }
    
        // Dispatch an event to update other Livewire components.
        $this->dispatch('taskCompleted');
    }

    /**
     * Checks for and awards new badges to the user based on their points.
     */
    protected function awardBadges($user): ?string
    {
        $currentPoints = $user->fresh()->points;
        $currentUserBadgeIds = $user->badges()->pluck('badges.id')->toArray();
    
        $newBadges = Badge::where('required_points', '<=', $currentPoints)
                          ->whereNotIn('id', $currentUserBadgeIds)
                          ->get();
    
        if ($newBadges->isNotEmpty()) {
            $user->badges()->attach($newBadges->pluck('id'));
            $badgeNames = $newBadges->pluck('name')->implode(', ');
    
            return '🎉 New Badge Unlocked: ' . $badgeNames;
        }
        return null;
    }

    public function render()
    {
        return view('livewire.help-now-modal');
    }
}
