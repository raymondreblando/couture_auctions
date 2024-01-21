<div class="flex justify-between items-center gap-4 py-2">
    <div>
        <p class="text-xs md:text-sm font-semibold text-dark leading-none">
            {{ $title }}
        </p>
        <p class="text-[10px] md:text-xs font-medium text-dark/60">
            {{ $subtitle }}
        </p>
    </div>
    <button class="{{ $buttonClass }} text-[10px] md:text-xs font-medium text-dark bg-gray-100 py-2 px-3 rounded-md" data-id="{{ $id }}">
        Update
    </button>
</div>