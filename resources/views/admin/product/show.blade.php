@use('App\Helpers\DateHelper')

<x-layout>
    <x-slot:title>
        Product Bids
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Product Bids'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(80rem,100%)] grid grid-cols-1 lg:grid-cols-3 gap-2">
                <x-product.product-details-card 
                    :product="$product"
                    :category="$product->category"
                    :product-image="$product->productimage"
                />
                <div class="relative p-6 bg-white rounded-md">
                    <div class="flex items-center justify-between gap-4 border-b border-b-gray-300/40 pb-3">
                        <p class="text-xs md:text-sm font-semibold text-dark">Product <br> Bidding history</p>
                        <div class="text-right">
                            <p class="text-[10px] md:text-xs font-medium text-dark/60">Ends in</p>
                            <p class="text-xs md:text-sm font-semibold text-dark">
                                {{ DateHelper::timeRemaining($product->bid_end_date) }}
                            </p>
                        </div>
                    </div>
                    <div id="bidder-container" class="custom-scroll lg:max-h-[385px] flex flex-col overflow-y-auto lg:pb-0" data-id="{{ $product->product_id }}">
                        @forelse ($product->bids as $key => $bid)
                            <x-product.bidder
                                :user="$bid->user"
                                :profile="$bid->user->profile"
                                :rank="$key"
                                :bid="$bid->amount"
                            />
                        @empty
                            <div class="h-[385px] flex flex-col items-center justify-center">
                                <img src="{{ asset('images/empty-history.svg') }}" alt="empty" class="w-28 h-28">
                                <p class="text-[10px] md:text-xs font-medium text-dark/60">No bidding history found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>