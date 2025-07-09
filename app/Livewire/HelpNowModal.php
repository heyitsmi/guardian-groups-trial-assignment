<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\Badge as BadgeModel;

class HelpNowModal extends Component
{
    public bool $showModal = false;
    public array $tasks = [];
    
    public function mount()
    {
        $this->loadTasks();
    }

    #[On('openHelpModal')]
    public function open()
    {
        $this->loadTasks();
        $this->showModal = true;
    }

    public function close()
    {
        $this->showModal = false;
    }

    public function loadTasks()
    {
        $allTasks = [
            ['id' => 1, 'icon' => '💬', 'title' => 'Answer an Unanswered Question', 'description' => 'Find a question in the forums that has no replies yet and share your knowledge.'],
            ['id' => 2, 'icon' => '👋', 'title' => 'Welcome a New User', 'description' => 'Visit the introductions thread and leave a welcoming comment for a new member.'],
            ['id' => 3, 'icon' => '✍️', 'title' => 'Review a Resource Entry', 'description' => 'Help us keep our information accurate by reviewing a resource page for outdated links.'],
            ['id' => 4, 'icon' => '❤️', 'title' => 'React to a Lonely Thread', 'description' => 'Find a post in the "Anybody There?" category and give it a supportive reaction.'],
        ];

        shuffle($allTasks);
        $this->tasks = array_slice($allTasks, 0, 3);
    }

    public function completeTask($taskId)
    {
        $user = Auth::user();
        $pointsEarned = 10; 

        $user->addPoints($pointsEarned);

        $this->awardBadges($user);
        
        session()->flash('task_completed_message', 'Thank you for your help! You\'ve earned 10 points.');

        $this->close();

        $this->dispatch('taskCompleted');
    }

    protected function awardBadges($user)
    {
        $currentPoints = $user->fresh()->points;

        $currentUserBadgeIds = $user->badges()->pluck('badges.id')->toArray();

        $newBadges = BadgeModel::where('required_points', '<=', $currentPoints)
                          ->whereNotIn('id', $currentUserBadgeIds)
                          ->get();

        if ($newBadges->isNotEmpty()) {
            $user->badges()->attach($newBadges->pluck('id'));

            $badgeNames = $newBadges->pluck('name')->implode(', ');
            session()->flash('new_badge_message', 'Congratulations! You have earned a new badge: ' . $badgeNames);
        }
    }


    public function render()
    {
        return view('livewire.help-now-modal');
    }
}
