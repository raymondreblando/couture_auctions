<button 
    {{ $attributes->class('block w-full h-12 2xl:h-16 text-xs 2xl:text-sm text-white bg-primary rounded-md')
        ->merge(['type' => 'submit']) }} 
>
    {{ $slot }}
</button>