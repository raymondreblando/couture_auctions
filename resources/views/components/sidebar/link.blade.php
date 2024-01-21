<li>
    <a href="{{ $url }}" class="group aside__link {{ $isActive() ? 'active' : '' }}">
        <i class="{{ $icon }}"></i>
        <span class="w-max absolute top-1/2 -translate-y-1/2 left-[90%] group-hover:left-[120%] text-sm text-dark bg-white py-1 px-3 rounded-md shadow-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all">
            {{ $title }}
        </span>
    </a>
</li>