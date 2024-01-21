<div class="fixed top-0 w-full md:w-[calc(100%-6rem)] left-0 md:left-[6rem] flex items-center justify-between gap-4 py-4 px-8 bg-white border-b md:border-none border-b-gray-300/40 z-[4]">
    <div class="flex items-center gap-3">
        <button class="show-sidebar block md:hidden font-semibold text-dark">
            <i class="ri-menu-2-line"></i>
        </button>
        <p class="text-sm md:text-base font-semibold text-dark">
            {{ $title }}
        </p>
    </div>
    <div class="flex items-center gap-4">
        <div class="searchbar hidden flex items-center gap-2 h-10 bg-gray-100 rounded-md px-4">
            <img 
                src="{{ asset('images/search.svg') }}" 
                alt="search" 
                class="w-5 h-5"
            >
            <input 
                type="text" 
                class="search-input w-full text-sm text-dark placeholder:text-dark/70 bg-transparent" 
                placeholder="Search"
            >
        </div>
        <button class="search-btn">
            <img 
                src="{{ asset('images/search.svg') }}" 
                alt="search" 
                class="w-4 md:w-5 h-4 md:h-5 pointer-events-none"
            >
        </button>
        <div class="flex items-center gap-2">
            <div class="grid place-content-center w-8 md:w-10 h-8 md:h-10 text-white font-medium bg-primary rounded-full">
                C
            </div>
            {{-- <img src="../../public/images/male.svg" alt="profile" class="w-8 h-8 object-cover rounded-full"> --}}
            <div class="hidden md:block">
                <p class="text-sm font-semibold text-dark">Couture</p>
                <p class="text-xs font-semibold text-dark/70">Administrator</p>
            </div>
        </div>
    </div>
</div>