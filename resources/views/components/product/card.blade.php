@use('App\Helpers\StringHelper')
@use('App\Helpers\DateHelper')
@use('Illuminate\Support\Number')

<div class="search-area product-card bg-white rounded-md overflow-hidden">
    <div class="relative">
        <img 
            src="{{ asset('storage/product_images/' . $productImage->image) }}" 
            alt="{{ $product->product_name }}" 
            class="w-full object-contain rounded-md"
        >
        <div class="absolute bottom-2 left-2 bg-white/80 w-max py-1 px-3 rounded-sm">
            @if(DateHelper::isTimeEnded($product->bid_end_date))
                <p class="text-[8px] font-bold text-dark">Bidding was</p>
                <p class="finder1 text-[10px] font-semibold text-dark">Completed</p>
            @else
                <p class="finder4 text-[8px] font-bold text-dark">Ongoing</p>
                <p class="finder1 text-[10px] font-semibold text-dark">
                    {{ DateHelper::timeRemaining($product->bid_end_date) }}
                </p>
            @endif
        </div>
    </div>
    <div class="py-4">
        <div class="px-4">
            <a 
                href="{{ route('products.show', $product) }}" 
                class="finder2 block text-[10px] md:text-[13px] text-dark font-semibold leading-none" 
                title="{{ $product->product_name }}"
            >
                {{ StringHelper::ellipsis($product->product_name) }}
            </a>
            <p class="finder3 text-[10px] md:text-[11px] font-medium text-dark/60 mb-3">
                {{ $category->category_name }}
            </p>
            <div class="flex justify-between items-center gap-3">
            <div>
                <p class="text-[10px] md:text-[11px] font-medium text-dark/60">Starts at</p>
                <p class="finder4 text-[10px] md:text-[11px] font-semibold text-dark">
                    {{ Number::currency($product->starting_price, in: 'PHP') }}
                </p>
            </div>
            <div class="flex gap-1">
                @if(DateHelper::isTimeEnded($product->bid_end_date))
                    <a href="bid-winner.html" title="bid winner">
                        <img src="{{ asset('images/profile-2.jpg') }}" alt="bid winner" class="w-8 h-8 object-cover rounded-full">
                    </a>
                @else
                    <button 
                        type="button" 
                        class="delete-btn w-8 h-8 grid place-items-center text-xs text-dark bg-gray-100 hover:bg-gray-200 rounded-full transition-all duration-200 ease-in" 
                        data-target="#delete-product-dialog"
                        data-id="{{ $product->product_id }}"
                    >
                        <i class="ri-delete-bin-line pointer-events-none" title="Delete Product"></i>
                    </button>
                @endif
                <a 
                    href="{{ route('products.edit', $product) }}" 
                    class="w-8 h-8 grid place-items-center text-xs text-primary hover:text-white bg-violet-100 hover:bg-primary rounded-full transition-all duration-200 ease-in"
                >
                    <i class="ri-pencil-line" title="Edit Product"></i>
                </a>
            </div>
            </div>
        </div>
    </div>
</div>