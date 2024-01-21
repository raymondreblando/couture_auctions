<div class="flex items-center gap-2 bg-white rounded-md py-4 px-4 mb-2">
    <div>
        <p class="text-[10px] md:text-xs font-semibold text-dark">
            {{ $getInTouch->fullname }}
        </p>
        <p class="text-[8px] md:text-[10px] font-bold text-dark/60">
            {{ $getInTouch->email }}
        </p>
    </div>
    <a href="{{ route('get-in-touch.show', $getInTouch) }}" class="py-2 px-4 bg-violet-100 text-xl text-primary rounded-full ml-auto">
        <i class="ri-chat-1-line"></i>
    </a>
</div>