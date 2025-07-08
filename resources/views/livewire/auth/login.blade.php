<div>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-gray-900">
            Welcome Back!
        </h1>
        <p class="mt-2 text-neutral-slate">
            Please sign in to continue.
        </p>
    </div>
    <form wire:submit="login">
        <x-forms.input 
            label="Email Address" 
            model="form.email" 
            type="email" 
            required 
            autofocus
        />
        <x-forms.input 
            label="Password" 
            model="form.password" 
            type="password" 
            required 
        />
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember_me" wire:model="form.remember" type="checkbox" class="h-4 w-4 text-brand-green border-gray-300 rounded focus:ring-brand-green">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>
        </div>
        <div>
            <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full flex justify-center items-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-semibold text-white bg-brand-green hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-opacity duration-200 disabled:opacity-75">
                <svg wire:loading wire:target="login" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="login">
                Sign In
                </span>
                <span wire:loading wire:target="login">
                Signing In...
                </span>
            </button>
        </div>
    </form>
    <p class="mt-8 text-center text-sm text-gray-600">
        Don't have an account? 
        <a href="{{ route('register') }}" wire:navigate class="font-medium text-brand-green hover:underline">
            Sign up
        </a>
    </p>
</div>
