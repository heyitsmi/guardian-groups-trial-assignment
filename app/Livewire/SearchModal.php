<?php

namespace App\Livewire;

use App\Models\GuardianGroup;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class SearchModal extends Component
{
    public bool $showModal = false;
    public string $search = '';
    public $results = [];
    public array $userGroupIds = [];

    #[On('open-search-modal')]
    public function open()
    {
        \Log::info('test');
        $this->showModal = true;
        $this->userGroupIds = Auth::user()->groups()->pluck('guardian_groups.id')->toArray();
    }

    public function close()
    {
        $this->showModal = false;
        $this->search = '';
        $this->results = [];
    }

    public function updatedSearch()
    {
        if (strlen($this->search) >= 2) {
            $this->results = GuardianGroup::search($this->search)
                // ->where('status', 'active')
                ->query(fn ($query) => $query->withCount('members'))
                ->take(7)
                ->get();
        } else {
            $this->results = [];
        }
    }

    public function joinGroup(int $groupId)
    {
        $user = Auth::user();

        if (in_array($groupId, $this->userGroupIds)) {
            $this->dispatch('show-toast', ['type' => 'error', 'message' => 'You are already a member of this group.']);
            return;
        }

        $user->groups()->attach($groupId);
        
        $this->dispatch('show-toast', ['type' => 'success', 'message' => 'Successfully joined the group!']);
        
        $this->close();
        $this->dispatch('taskCompleted');
    }

    public function render()
    {
        return view('livewire.search-modal');
    }
}
