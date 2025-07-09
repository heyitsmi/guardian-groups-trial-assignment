<?php

namespace App\Livewire\GuardianGroups;

use App\Models\GuardianGroup;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Find a Guardian Group')]
class Search extends Component
{
    use WithPagination;

    public string $search = '';
    public array $userGroupIds = [];

    public function mount()
    {
        $this->userGroupIds = Auth::user()->groups()->pluck('guardian_groups.id')->toArray();
    }

    public function joinGroup(int $groupId)
    {
        $user = Auth::user();

        if (in_array($groupId, $this->userGroupIds)) {
            session()->flash('error', 'You are already a member of this group.');
            return;
        }

        $user->groups()->attach($groupId);

        session()->flash('status', 'Successfully joined the group!');
        
        return $this->redirect(route('dashboard'), navigate: true);
    }
    
    public function render()
    {
        $groups = GuardianGroup::query()
            ->withCount('members') 
            ->active()
            ->when($this->search, function ($query) {
                $query->where('group_name', 'like', '%' . $this->search . '%')
                      ->orWhere('zip_code', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.guardian-groups.search', [
            'groups' => $groups,
        ]);
    }
}