<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

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
        Auth::user()->addPoints(10); 

        session()->flash('task_completed_message', 'Thank you for your help! You\'ve earned 10 points.');
        
        $this->close();

        $this->dispatch('taskCompleted');
    }

    public function render()
    {
        return view('livewire.help-now-modal');
    }
}
