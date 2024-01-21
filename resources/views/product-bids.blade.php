@use('App\Helpers\DateHelper')
@use('App\Models\Bid')

<x-layout>
    <x-slot:title>
        Product Bids
    </x-slot:title>

    @include('partials.nav')
    <section class="min-h-screen flex items-center bg-white pt-28 md:pt-0">
      <div class="w-[min(80rem,90%)] grid grid-cols-1 lg:grid-cols-3 gap-2 mx-auto">
        <x-product.product-details-card 
            :product="$product"
            :category="$product->category"
            :product-image="$product->productimage"
        />
        <div class="relative py-4 px-6">
            <div class="flex items-center justify-between gap-4 border-b border-b-gray-300/40 pb-3">
                <p class="text-xs md:text-sm font-semibold text-dark">Product <br> Bidding history</p>
                <div class="text-right">
                    @if(DateHelper::isTimeEnded($product->bid_end_date))
                        <p class="text-[10px] md:text-xs font-medium text-dark/60">Bidding was</p>
                        <p class="text-xs md:text-sm font-semibold text-dark">Completed</p>
                    @else
                        <p class="text-[10px] md:text-xs font-medium text-dark/60">Ends in</p>
                        <p class="text-xs md:text-sm font-semibold text-dark">
                            {{ DateHelper::timeRemaining($product->bid_end_date) }}
                        </p>
                    @endif
                </div>
            </div>
          <div id="bidder-container" class="custom-scroll lg:max-h-[300px] overflow-y-auto pb-48 lg:pb-0" data-id="{{ $product->product_id }}">
            @forelse ($product->bids as $key => $bid)
                <x-product.bidder
                    :user="$bid->user"
                    :profile="$bid->user->profile"
                    :rank="$key"
                    :bid="$bid->amount"
                />
            @empty
                <div class="h-[300px] flex flex-col items-center justify-center">
                    <img src="{{ asset('images/empty-history.svg') }}" alt="empty" class="w-28 h-28">
                    <p class="text-[10px] md:text-xs font-medium text-dark/60">No bidding history found</p>
                </div>
            @endforelse
          </div>
          <div class="fixed lg:absolute bottom-0 lg:bottom-4 inset-x-0 bg-white border-t md:border-t-0 border-gray-200 px-6 py-6 lg:py-0">
            @auth
                @unless (DateHelper::isTimeEnded($product->bid_end_date))
                    @can('create', Bid::class)
                        <form 
                            method="POST"
                            id="bid-form"
                            autocomplete="off"
                        >
                            @php
                                $amount = auth()->user()->getBidAmount($product->product_id) ?? $product->starting_price;
                            @endphp
                            <x-forms.input 
                                type="number"
                                name="amount"
                                :value="$amount"
                                placeholder="Enter amount"
                                class="mb-2"
                            />
                            <div class="flex items-center gap-2">
                                <button type="submit" id="confirm-bid-btn" class="w-full h-12 text-white text-[10px] md:text-xs bg-primary rounded-md" data-id="{{ $product->product_id }}">Confirm</button>
                                <button type="button" id="cancel-bid-btn" class="w-full h-12 text-primary text-[10px] md:text-xs font-medium border border-primary rounded-md" data-id="{{ $product->product_id }}">Cancel</button>
                            </div>
                        </form>
                    @endcan
                @endunless

                @cannot('create', Bid::class)
                    <p class="text-xs md:text-sm font-medium text-center text-dark mb-2">Ready to Dive into the Action?</p>
                    <p class="text-[10px] md:text-sm text-center text-gray-500 leading-none">Unlock Your Bidding Potential - Verify Your 
                        <br> 
                        <a href="{{ route('profile') }}" class="text-primary font-semibold">Account</a> Now!
                    </p>
                @endcannot
            @endauth

            @guest
                <p class="text-xs md:text-sm font-medium text-center text-dark mb-3">
                    Ready to join the bidding excitement?
                </p>
                <div class="flex items-center justify-center gap-3">
                    <a href="{{ route('login') }}" class="text-[10px] md:text-xs text-white text-center font-medium bg-primary rounded-md py-3 px-8">Login</a>
                    <p class="text-[10px] md:text-xs font-semibold text-center text-dark">OR</p>
                    <a href="{{ route('signup') }}" class="text-[10px] md:text-xs text-white text-center font-medium bg-primary rounded-md py-3 px-7">Register</a>
                </div>
            @endguest
          </div>
        </div>
      </div>
    </section>
</x-layout>