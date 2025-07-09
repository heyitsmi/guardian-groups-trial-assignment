<div>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Create Your Account
        </h1>
        <p class="mt-2 text-neutral-slate">
            Join our community to help and be helped.
        </p>
    </div>
    <form wire:submit="register">
        <x-forms.input 
            label="Full Name" 
            model="form.name" 
            required 
            autofocus 
        />

        <x-forms.input 
            label="Email Address" 
            model="form.email" 
            type="email" 
            required 
        />

        <x-forms.input 
            label="Password" 
            model="form.password" 
            type="password" 
            required 
        />

        <x-forms.input 
            label="Confirm Password" 
            model="form.password_confirmation" 
            type="password" 
            required 
        />

        <div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-semibold text-white bg-brand-green hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-opacity duration-200 disabled:opacity-75">
                <svg wire:loading wire:target="register" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="register">
                    Sign Up
                </span>
                <span wire:loading wire:target="register">
                    Signing Up...
                </span>
            </button>
        </div>
    </form>
    <p class="mt-8 text-center text-sm text-gray-600">
        Already have an account? 
        <a href="{{ route('login') }}" wire:navigate class="font-medium text-brand-green hover:underline">
            Sign in
        </a>
    </p>
</div>