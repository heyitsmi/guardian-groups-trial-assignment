<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class Profile extends Component
{
    use WithFileUploads;

    #[Validate('required|string|min:3|max:250')]
    public $name;

    #[Validate('required|email')]
    public $email;

    #[Validate('image|max:1024')]
    public $photo;

    public $current_password;
    public $password;
    public $password_confirmation;


    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfileInformation()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'image', 'max:1024'], // 1MB Max
        ]);

        if ($this->photo) {
            // Store the new photo and get its path
            $validated['avatar'] = $this->photo->store('avatars', 'public');
            // Update the user's avatar path in the database
            $user->update(['avatar' => $validated['avatar']]);
        }

        // Update name and email
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('status', 'Profile successfully updated.');

        // Redirect to refresh the page and see changes
        return $this->redirect(route('profile'), navigate: true);
    }

    /**
     * Update the user's password.
     */
    public function updatePassword()
    {
        $user = Auth::user();

        $validated = $this->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Reset password fields
        $this->reset('current_password', 'password', 'password_confirmation');

        session()->flash('status', 'Password successfully updated.');
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
