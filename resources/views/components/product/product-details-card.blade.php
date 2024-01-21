@use('Illuminate\Support\Number')

<div class="lg:col-span-2 md:grid grid-cols-2 gap-4 bg-white rounded-md">
    <img 
        src="{{ asset('storage/product_images/' . $productImage->image) }}" 
        alt="{{ $product->product_name }}"
        class="w-full rounded-md"
    >
    <div class="flex flex-col p-6">
    <h1 class="text-lg md:text-2xl font-semibold text-dark mb-1">
        {{ $product->product_name  }}
    </h1>
    <p class="text-sm font-medium text-dark/60 mb-6">
        {{ $category->category_name }}
    </p>
    <p class="text-xs md:text-sm font-semibold text-dark mb-2">Description</p>
    <ul class="mb-6">
        @foreach (explode(';', $product->product_description) as $description)
            <li class="text-[10px] md:text-xs font-medium text-dark/60 mb-2 last:mb-0">
                {{ $description }}
            </li>
        @endforeach
    </ul>
    <div class="flex items-center justify-between gap-4 mt-auto">
        <p class="text-[10px] md:text-xs font-medium text-dark/60">Bidding Price <br> Starts at</p>
        <p class="text-xl font-bold text-dark">
            {{ Number::currency($product->starting_price, in: 'PHP') }}
        </p>
    </div>
    </div>
</div>