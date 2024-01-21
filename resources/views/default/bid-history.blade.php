<x-layout>
    <x-slot:title>
        Bid History
    </x-slot:title>

    @include('partials.nav')
    <div class="min-h-screen bg-ash-gray pb-8">
      <section class="w-[min(80rem,90%)] mx-auto pt-32 pb-12">
        <button class="show-category block md:hidden fixed top-1/2 -translate-y-1/2 left-0 bg-white rounded-r-xl shadow-2xl text-2xl">
          <i class="ri-arrow-right-s-line"></i>
        </button>
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
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
          @forelse ($bids as $key => $bid)
            <x-history-card
              :product="$bid->product"
              :category="$bid->product->category"
              :product-image="$bid->product->productimage"
              :rank="$rankings[$key]->rank"
            />
          @empty
            <div class="w-full h-[calc(100vh-16rem)] flex flex-col items-center justify-center gap-2">
              <img src={{ asset('images/empty-history.svg') }}" alt="empty" class="w-28 h-28">
              <p class="text-[10px] font-medium text-dark/60">No bidding history found</p>
            </div>
          @endforelse 
        </div>
      </section>
    </d>
</x-layout>