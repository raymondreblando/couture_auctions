@use('App\Helpers\StringHelper')
@use('App\Helpers\DateHelper')

<div class="search-area bg-white rounded-md p-2">
    <div class="grid grid-cols-2 gap-4">
        <img 
            src="{{ asset('storage/product_images/' . $productImage->image) }}" 
            alt="{{ $product->product_name }}" 
            class="w-full rounded-md"
        >
        <div class="flex flex-col py-2">
        <div>
            <a href="{{ route('default.products.show', $product) }}" class="finder1 text-xs md:text-sm font-semibold text-dark">
                {{ StringHelper::ellipsis($product->product_name, 14) }}
            </a>
            <p class="finder2 text-[10px] md:text-xs font-medium text-dark/60 mb-3">
                {{ $category->category_name }}
            </p>
            @if(DateHelper::isTimeEnded($product->bid_end_date))
                <p class="text-[10px] md:text-xs font-medium text-dark/60">Bidding was</p>
                <p class="finder3 text-[10px] md:text-xs font-semibold text-dark">Completed</p>
            @else
                <p class="finder4 text-[10px] md:text-xs font-medium text-dark/60">Ongoing</p>
                <p class="finder5 text-xs md:text-xs font-bold text-dark">
                    {{ DateHelper::timeRemaining($product->bid_end_date) }}
                </p>
            @endif
        </div>
        <div class="flex items-center gap-2 mt-auto">
            <span class="text-xs font-bold bg-violet-100 text-primary grid place-items-center w-8 h-8 rounded-md">
                {{ $rank }}
            </span>
            <div>
            <p class="text-[11px] md:text-xs font-semibold text-dark leading-none">
                Rank No. {{ $rank }}
            </p>
            <p class="text-[9px] md:text-[11px] font-medium text-dark/60">Current rank</p>
            </div>
        </div>
        </div>
    </div>
    </div>