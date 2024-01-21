<x-layout>
    <x-slot:title>
        Bid History
    </x-slot:title>

    @include('partials.nav')
    <div class="min-h-screen bg-ash-gray pb-8">
      <section class="w-[min(80rem,90%)] mx-auto pt-32 pb-12">
        <div class="mobile-searchbar hidden items-center gap-3 bg-gray-100 rounded-md py-4 px-4 mb-4">
          <img src="../../public/icons/search-normal-linear.svg" alt="search" class="w-4 h-4">
          <input type="text" class="text-xs text-dark placeholder:text-dark/60 bg-transparent" placeholder="Search something..." autocomplete="off">
        </div>
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6">
          <div>
            <h1 class="text-lg md:text-xl font-semibold text-dark">Bidding history</h1>
            <p class="text-[10px] md:text-xs font-medium text-dark/60">Explore your past bids, victories, and the excitement of each <br> winning choice in your personalized bidding history</p>
          </div>
        </div>
        @if (count($bids) > 0)
          <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
            @foreach ($bids as $key => $bid)
              <x-history-card
                :product="$bid->product"
                :category="$bid->product->category"
                :product-image="$bid->product->productimage"
                :rank="$rankings[$key]->rank"
              />
            @endforeach
          </div>
        @else
          <div class="w-full h-[calc(100vh-16rem)] flex flex-col items-center justify-center gap-2">
              <img src="{{ asset('images/empty-history.svg') }}" alt="empty" class="w-28 h-28">
              <p class="text-xs font-medium text-dark/60">No bidding history found</p>
            </div>
        @endif
      </section>
    </d>
</x-layout>