<a {{ $attributes->merge() }} class="flex items-center gap-1 text-xs 2xl:text-sm font-semibold text-primary hover:text-white border border-primary py-2 px-4 rounded-md hover:bg-primary transition-all">
    {{ $slot }}
    <i class="ri-arrow-right-s-line"></i>
</a>