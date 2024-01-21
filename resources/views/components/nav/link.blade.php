<li>
    <a 
        href="{{ $url }}" 
        class="nav__link 
        {{ $isActive() ? 'active' : '' }} 
        uppercase lg:normal-case"
    >
        {{ $title }}
    </a>
</li>