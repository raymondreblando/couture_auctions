@props(['className', 'title', 'id', 'target', 'icon'])

<button 
    class="{{ $className }} grid place-items-center w-6 md:w-8 h-6 md:h-8 hover:bg-gray-100 border-2 border-gray-300/40 rounded-full transition-all duration-200" 
    title="{{ $title }}"
    data-id="{{ $id }}"
    data-target="{{ $target }}"
>
    <img 
        src="{{ asset('images/' . $icon) }}" 
        alt="{{ $title }}" 
        class="w-3 md:w-4 h-3 md:h-4"
    >
</button>