@use('App\Helpers\StringHelper')
@use('Illuminate\Support\Number')

<div class="bg-white rounded-md p-2">
    <img 
        src="{{ asset('storage/product_images/' . $image) }}" 
        alt="{{ $product->product_name }}" 
        class="w-full rounded-md mb-1"
    >
    <a href="{{ route('products.show', $product) }}" class="text-[10px] md:text-[13px] font-semibold text-dark">
        {{ StringHelper::ellipsis($product->product_name) }}
    </a>
    <p class="text-[10px] font-semibold text-dark/60 mb-3">
        {{ $category }}
    </p>
    <div class="flex items-center justify-between gap-4">
        <p class="text-[9px] md:text-[11px] font-semibold text-dark/60 leading-none">
            <span class="text-primary font-extrabold">{{ Number::abbreviate($count) }}</span> bidder's <br> Participated
        </p>
        <div class="flex -space-x-3">
            @foreach ($bids as $bid)
                @isset($bid->user->profile)
                    <img src="{{ asset('storage/profiles/' . $bid->user->profile->image) }}" alt="profile" class="w-7 h-7 object-cover rounded-full">
                @endisset
                @empty($bid->user->profile)
                    <div class="grid place-content-center w-7 h-7 text-primary text-xs font-semibold bg-purple-100 rounded-full">
                        {{ StringHelper::acronym($bid->user->fullname) }}
                    </div>
                @endempty
            @endforeach
        </div>
    </div>
</div>