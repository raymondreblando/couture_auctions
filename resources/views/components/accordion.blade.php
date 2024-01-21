<div class="group accordion {{ $className }} cursor-pointer">
    <div class="accordion-header flex justify-between items-center border border-gray-200 py-4 px-8 gap-4">
        <div class="flex items-center gap-3">
            <span class="w-8 h-8 grid place-content-center text-sm text-primary font-semibold bg-purple-100 rounded-full">
                {{ $count }}
            </span>
            <p class="text-dark">{{ $question }}</p>
        </div>
        <button type="button" class="accordion-btn group-[.show]:rotate-180 text-lg transition-all duration-200"><i class="ri-arrow-down-s-line"></i></button>
    </div>
    <div class="accordion-content max-h-0 group-[.show]:max-h-fit border-0 group-[.show]:border border-t-0 border-gray-200 py-0 group-[.show]:py-4 px-8 overflow-hidden transition-all duration-200">
        <p class="text-sm text-gray-600">{{ $content }}</p>
    </div>
</div>