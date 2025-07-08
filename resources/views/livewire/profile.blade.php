<div class="max-w-xl mx-auto">
    <header class="bg-white shadow-sm mb-6">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold leading-tight text-gray-900">
                Your Profile
            </h1>
        </div>
    </header>
    {{-- Success Message --}}
    @if (session('status'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg" role="alert">
        <p>{{ session('status') }}</p>
    </div>
    @endif
    {{-- Update Profile Information Card --}}
    <div class="p-4 mb-6 sm:p-8 bg-white shadow-lg sm:rounded-lg">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Profile Information
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Update your account's profile information and email address.
                    </p>
                </header>
                <form wire:submit="updateProfileInformation" class="mt-6 space-y-6">
                    {{-- Profile Photo Section --}}
                    <div>
                        <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                        <!-- Hidden file input, triggered by the button -->
                        <input type="file" id="photo" wire:model="photo" class="hidden">
                        <div class="mt-2 flex items-center gap-x-4">
                            {{-- Show new photo preview if available, otherwise show current avatar --}}
                            @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" class="h-20 w-20 rounded-full object-cover">
                            @else
                            <img src="{{ Auth::user()->avatar_url }}" class="h-20 w-20 rounded-full object-cover">
                            @endif
                            {{-- Button to trigger the file input --}}
                            <label for="photo" class="cursor-pointer inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                            Select A New Photo
                            </label>
                        </div>
                        @error('photo') <span class="text-red-500 mt-1 text-sm">{{ $message }}</span> @enderror
                    </div>
                    {{-- Reusable Name Input --}}
                    <x-forms.input 
                        label="Full Name" 
                        model="name" 
                        required 
                        />
                    {{-- Reusable Email Input --}}
                    <x-forms.input 
                        label="Email Address" 
                        model="email" 
                        type="email" 
                        required 
                        />
                    <div class="flex items-center gap-4">
                        <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center px-4 py-2 bg-brand-green border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 disabled:opacity-75">
                            <svg wire:loading wire:target="updateProfileInformation" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span wire:loading.remove wire:target="updateProfileInformation">Save</span>
                            <span wire:loading wire:target="updateProfileInformation">Saving...</span>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
    {{-- Update Password Card --}}
    <div class="p-4 sm:p-8 bg-white shadow-lg sm:rounded-lg">
        <div class="max-w-xl">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        Update Password
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Ensure your account is using a long, random password to stay secure.
                    </p>
                </header>
                <form wire:submit="updatePassword" class="mt-6 space-y-6">
                    <x-forms.input 
                        label="Current Password" 
                        model="current_password" 
                        type="password" 
                        required 
                        />
                    <x-forms.input 
                        label="New Password" 
                        model="password" 
                        type="password" 
                        required 
                        />
                    <x-forms.input 
                        label="Confirm Password" 
                        model="password_confirmation" 
                        type="password" 
                        required 
                        />
                    <div class="flex items-center gap-4">
                        <button type="submit" wire:loading.attr="disabled" class="inline-flex items-center px-4 py-2 bg-brand-green border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:opacity-90 disabled:opacity-75">
                            <svg wire:loading wire:target="updatePassword" class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span wire:loading.remove wire:target="updatePassword">Save</span>
                            <span wire:loading wire:target="updatePassword">Saving...</span>
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>