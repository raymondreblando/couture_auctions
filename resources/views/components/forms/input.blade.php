<input 
    {{ $attributes->class('w-full h-12 2xl:h-16 text-[10px] 2xl:text-sm text-dark/60 font-medium placeholder:text-dark/60 px-4 2xl:px-6 bg-ash-gray rounded-md')
        ->merge([
            'type' => 'text'
    ]) }}
    name="{{ $name }}"
    value="{{ $value }}"
>