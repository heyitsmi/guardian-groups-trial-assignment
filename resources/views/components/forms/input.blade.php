@props([
    'label',
    'model',
    'type' => 'text',
    'wrapperClass' => 'mb-4'
])

<div class="{{ $wrapperClass }}">
    <label for="{{ $model }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <input 
        id="{{ $model }}" 
        type="{{ $type }}" 
        wire:model="{{ $model }}"
        {{ $attributes->merge([
            'class' => 'mt-1 block w-full px-3 py-2 bg-white border rounded-md shadow-sm placeholder-gray-400 focus:outline-none sm:text-sm ' . 
                       ($errors->has($model) 
                           ? 'border-red-500 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500' 
                           : 'border-gray-300 focus:ring-brand-green focus:border-brand-green')
        ]) }}
    >
    @error($model)
        <small class="text-red-500 mt-1">{{ $message }}</small>
    @enderror
</div>
