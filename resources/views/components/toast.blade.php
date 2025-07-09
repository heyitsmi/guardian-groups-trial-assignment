<div 
    x-data="{
        show: false,
        message: '',
        type: 'success',
        timeout: null,
        showToast(detail) {
            this.message = detail.message;
            this.type = detail.type || 'success';
            this.show = true;
            
            clearTimeout(this.timeout);
            this.timeout = setTimeout(() => {
                this.show = false;
            }, 5000); // The toast will disappear after 5 seconds
        }
    }"
    @show-toast.window="showToast($event.detail)"
    x-show="show"
    x-transition:enter="transform ease-out duration-300 transition"
    x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
    x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed top-5 right-5 z-50 w-full max-w-xs"
    style="display: none;"
>
    <div class="p-4 rounded-lg shadow-lg"
         :class="{
            'bg-green-100 border-l-4 border-green-500': type === 'success',
            'bg-red-100 border-l-4 border-red-500': type === 'error'
         }"
    >
        <div class="flex">
            <div class="flex-shrink-0">
                <!-- Icon for success -->
                <svg x-show="type === 'success'" class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <!-- Icon for error -->
                <svg x-show="type === 'error'" class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium"
                   :class="{
                        'text-green-800': type === 'success',
                        'text-red-800': type === 'error'
                   }"
                   x-text="message"
                ></p>
            </div>
        </div>
    </div>
</div>
