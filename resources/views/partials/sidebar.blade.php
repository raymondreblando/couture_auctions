<aside class="sidebar">
    <div>
        <div class="relative flex justify-center px-4 mb-10">
            <img src="{{ asset('icon.svg') }}" alt="logo" class="w-12 h-12">
            {{-- <button class="close-sidebar absolute top-1/2 -translate-y-1/2 left-[90%] flex md:hidden items-center justify-center bg-ash-gray border-2 border-gray-200 text-dark w-6 h-6 rounded-full">
                <i class="ri-arrow-left-s-line"></i>
            </button> --}}
        </div>
        <ul>
            <x-sidebar.link 
                url="{{ route('dashboard') }}"
                icon="ri-home-3-line"
                title="Dashboard"
                :routes="['dashboard']"
            />
            <x-sidebar.link 
                url="{{ route('products.index') }}"
                icon="ri-box-3-line"
                title="Products"
                :routes="['products.index', 'products.create', 'products.edit', 'products.show']"
            />
            <x-sidebar.link 
                url="{{ route('categories.index') }}"
                icon="ri-apps-2-line"
                title="Categories"
                :routes="['categories.index']"
            />
            <x-sidebar.link 
                url="{{ route('accounts') }}"
                icon="ri-user-line"
                title="Accounts"
                :routes="['accounts']"
            />
            <x-sidebar.link 
                url="{{ route('get-in-touch') }}"
                icon="ri-chat-1-line"
                title="Get in Touch"
                :routes="['get-in-touch', 'get-in-touch.show']"
            />
            <x-sidebar.link 
                url="{{ route('settings') }}"
                icon="ri-settings-4-line"
                title="Settings"
                :routes="['settings']"
            />
        </ul>
    </div>
    <ul>
        <x-sidebar.link 
            url="{{ route('logout') }}"
            icon="ri-shut-down-line"
            title="Sign Out"
        />
    </ul>
</aside>