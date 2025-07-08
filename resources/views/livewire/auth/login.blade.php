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
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
            <input id="email" type="email" wire:model="form.email" required autofocus
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green focus:border-brand-green sm:text-sm" />
            @error('form.email')
            <small class="text-danger">{{ $message }}</small>
            @enderror    
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input id="password" type="password" wire:model="form.password" required
                class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-brand-green focus:border-brand-green sm:text-sm" />
            @error('form.password')
            <small class="text-danger">{{ $message }}</small>
            @enderror    
        </div>
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember_me" wire:model="form.remember" type="checkbox" value="true" class="h-4 w-4 text-brand-green border-gray-300 rounded focus:ring-brand-green">
                <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
            </div>
        </div>
        <div>
            <button type="submit"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-semibold text-white bg-brand-green hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-opacity duration-200">
            Sign In
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