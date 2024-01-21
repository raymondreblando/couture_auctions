<x-layout>
    <x-slot:title>
        Products
    </x-slot:title>

    @include('partials.nav')
    <div class="min-h-screen bg-ash-gray pb-8">
      <section class="w-[min(80rem,90%)] mx-auto pt-24 md:pt-32 pb-12">
        <button class="show-filter grid md:hidden fixed top-1/2 -translate-y-1/2 left-0 w-9 h-9 place-content-center text-2xl bg-white border border-gray-300 rounded-full shadow-2xl">
          <i class="ri-arrow-right-s-line"></i>
        </button>
        <div class="mobile-searchbar hidden flex items-center gap-3 bg-gray-100 rounded-md py-4 px-4 mb-4">
          <img src="{{ asset('images/search.svg') }}" alt="search" class="w-4 h-4">
          <input type="text" class="search-input text-xs text-dark placeholder:text-dark/60 bg-transparent" placeholder="Search" autocomplete="off">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-[13rem_auto] gap-4">
          <x-filter-menu 
            :categories="$categories"
            :subcategories="$subcategories"
          />
          <div id="product-wrapper" class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3">
            @foreach ($products as $product)
              <x-product.card-v2 
                :product="$product"
                :product-image="$product->productimage"
                :category="$product->category"
              />
            @endforeach
          </div>
        </div>
      </section>
    </d>
</x-layout>