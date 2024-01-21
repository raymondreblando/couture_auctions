<textarea 
    {{ $attributes->class(
        'resize-none w-full h-28 text-[10px] md:text-sm text-dark/60 font-medium placeholder:text-dark/60 p-4 bg-ash-gray rounded-md overflow-hidden'
    )->merge() }}
>{{ $slot }}</textarea>