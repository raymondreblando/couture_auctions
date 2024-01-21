@use('App\Helpers\StringHelper')

<header class="header">
    <nav class="relative w-[min(80rem,90%)] flex justify-between items-center gap-4 bg-white mx-auto py-3">
        <div class="flex items-center gap-12">
            <x-nav.logo />
            <ul class="nav-menu">
                <x-nav.link
                    url="{{ route('home') }}"
                    title="Home"
                    :routes="['home']"
                />
                <x-nav.link
                    url="{{ route('default.products') }}"
                    title="Products"
                    :routes="['default.products', 'default.products.show']"
                />
                @auth
                    <x-nav.link
                        url="{{ route('history') }}"
                        title="History"
                        :routes="['history']"
                    />
                    <div class="flex lg:hidden items-center gap-4 mt-6">
                        <a href="{{ route('profile') }}" class="flex items-center gap-2">
                            @empty($user->profile)
                                <div class="grid place-content-center w-12 h-12 text-xl text-primary font-semibold bg-purple-100 rounded-full">
                                    {{ StringHelper::acronym($user->fullname) }}
                                </div>
                            @endempty
                            @isset($user->profile)
                                <img 
                                    src="{{ asset('storage/profiles/' . $user->profile->image) }}" 
                                    alt="profile" 
                                    class="w-9 h-9 object-cover rounded-full"
                                >
                            @endisset
                            <div>
                                <p class="text-sm font-semibold text-dark leading-none">
                                    {{ $user->fullname }}
                                </p>
                                <p class="text-xs font-semibold text-dark/60">
                                    {{ $user->username }}
                                </p>
                            </div>
                        </a>
                        <a href="{{ route('logout') }}" class="w-12 h-12 grid place-content-center hover:bg-ash-gray border-2 border-gray-100 rounded-full transition-all" title="Log Out">
                            <i class="ri-logout-circle-r-line"></i>
                        </a>
                    </div>
                @endauth
                @guest
                    <li class="w-full block lg:hidden">
                        <a href="{{ route('login') }}" class="block w-full text-xl bg-primary text-white text-center py-4 rounded-[5px]">
                            Sign In
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="hidden lg:flex items-center gap-3">
            @auth
                <x-nav.notification 
                    :class-names="['show-notification', 'notification']" 
                    :user="$user"
                /> 
            @endauth
            <x-nav.search-button class="search-btn" />
            <div class="searchbar hidden flex items-center gap-3 bg-gray-100 rounded-md py-4 px-4">
                <img 
                    src="{{ asset('images/search.svg') }}" 
                    alt="search" 
                    class="w-4 h-4"
                >
                <input 
                    type="text" 
                    class="search-input text-xs text-dark placeholder:text-dark/60 bg-transparent" 
                    placeholder="Search" 
                    autocomplete="off"
                >
            </div>
            @auth
                <div>
                    <a href="{{ route('profile') }}" class="hidden lg:flex items-center gap-2">
                        @empty($user->profile)
                            <div class="grid place-content-center w-10 h-10 text-primary font-semibold bg-purple-100 rounded-full">
                                {{ StringHelper::acronym($user->fullname) }}
                            </div>
                        @endempty
                        @isset($user->profile)
                            <img 
                                src="{{ asset('storage/profiles/' . $user->profile->image) }}" 
                                alt="profile" 
                                class="w-7 h-7 object-cover rounded-full"
                            >
                        @endisset
                        <div>
                            <p class="text-[10px] md:text-xs font-semibold text-dark leading-none">
                                {{ $user->fullname }}
                            </p>
                            <p class="text-[9px] md:text-[10px] font-semibold text-dark/60">
                                {{ $user->username }}
                            </p>
                        </div>
                    </a>
                </div>
                <a href="{{ route('logout') }}" class="w-10 h-10 grid place-content-center hover:bg-ash-gray border border-gray-100 rounded-full transition-all" title="Log Out">
                    <i class="ri-logout-circle-r-line"></i>
                </a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="text-xs md:text-sm bg-primary text-white py-4 px-8 rounded-[5px]">
                    Sign In
                </a>
            @endguest
        </div>
        <div class="flex lg:hidden items-center gap-2">
            @auth 
                <x-nav.notification 
                    :class-names="['mobile-show-notification', 'mobile-notification']" 
                    :user="$user"
                />
            @endauth
            <x-nav.search-button class="mobile-search-btn" />
            <button class="menu-btn font-semibold py-2 px-3 border border-gray-300/40 rounded-full">
                <i class="ri-menu-5-line"></i>
            </button>
        </div>
    </nav>
</header>