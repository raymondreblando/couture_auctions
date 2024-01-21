<button 
    type="button" 
    {{ $attributes->class('hover:bg-ash-gray border border-gray-100 rounded-full p-3 transition-all') }}
>
    <img 
        src="{{ asset('images/search.svg') }}" 
        alt="search" 
        class="w-4 h-4 pointer-events-none"
    >
</button>