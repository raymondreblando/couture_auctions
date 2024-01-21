@use('App\Helpers\StringHelper')
@use('App\Helpers\DateHelper')
@use('Illuminate\Support\Number')

<div class="search-area h-max bg-white rounded-md overflow-hidden">
    <img 
        src="{{ asset('storage/product_images/' . $productImage->image) }}" 
        alt="{{ $product->product_name }}" 
        class="w-full object-contain rounded-md"
    >
    <div class="py-4">
        <div class="px-6">
            <a href="{{ route('default.products.show', $product) }}" class="finder1 block text-xs md:text-sm text-dark font-semibold leading-none">
                {{ StringHelper::ellipsis($product->product_name) }}
            </a>
            <p class="finder2 text-[10px] md:text-xs font-medium text-dark/60 mb-3">
                {{ $category->category_name }}
            </p>
            <p class="text-[10px] md:text-xs font-medium text-dark/60">Starting Price</p>
            <p class="finder3 text-xs md:text-sm font-bold text-dark mb-2">
                {{ Number::currency($product->starting_price, in: 'PHP') }}
            </p>
        </div>
        <div class="flex items-center justify-between gap-3 border-t-2 border-t-ash-gray pt-3 px-6">
            <div>
                @if(DateHelper::isTimeEnded($product->bid_end_date))
                    <p class="text-[10px] md:text-xs font-medium text-dark/60">Bidding was</p>
                    <p class="finder4 text-xs md:text-sm font-bold text-dark">Completed</p>
                @else
                    <p class="finder5 text-[10px] md:text-xs font-medium text-dark/60">Ongoing</p>
                    <p class="finder6 text-xs md:text-sm font-bold text-dark">
                        {{ DateHelper::timeRemaining($product->bid_end_date) }}
                    </p>
                @endif
            </div>
            @if(! DateHelper::isTimeEnded($product->bid_end_date))
                <a href="{{ route('default.products.show', $product) }}" class="text-[10px] md:text-xs text-white bg-primary rounded-sm py-2 px-4">
                    Place a bid
                </a>
            @endif
        </div>
    </div>
</div>