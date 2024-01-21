<x-layout>
    <x-slot:title>
        Products
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Products'])

        <x-dialog 
          id="delete-product-dialog"
          heading="Delete Product"
          message="delete this product"
          selector="confirm-delete-product"
        />

        <div class="w-full min-h-screen pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
          <div class="flex flex-col-reverse md:flex-row md:items-center justify-between gap-4 mb-4">
              <div class="flex-1 md:flex-initial flex items-start md:items-center justify-between md:justify-start gap-2">
                  <x-tick-box data-value="">
                    All
                  </x-tick-box>
                  <x-tick-box data-value="Ongoing">
                    Ongoing
                  </x-tick-box>
                  <x-tick-box data-value="Completed">
                    Completed
                  </x-tick-box>
              </div>
              <a href="{{ route('products.create') }}" class="flex items-center justify-center bg-primary text-[10px] md:text-sm text-white h-10 leading-8 rounded-[5px] gap-2 px-4">
                  <i class="ri-add-line"></i>
                  Add Product
              </a>
          </div>
          <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 xl:grid-cols-8 gap-3">
            @forelse ($products as $product)
              <x-product.card 
                :product="$product" 
                :category="$product->category" 
                :product-image="$product->productimage"
              />
            @empty
              @for ($index = 0; $index < 16; $index++)
                <x-product.card-placeholder />
              @endfor
            @endforelse
          </div>
          {{-- <div class="flex justify-center md:justify-between items-center gap-2 mt-4">
            <p class="hidden md:block text-[10px] text-grey font-medium bg-white py-[7px] px-4 rounded-md">Showing 1 / 20</p>
            <div class="flex items-center gap-2">
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">Prev</a>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">1</a>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">2</a>
                <li class="list-none text-xs text-dark/60 font-medium py-[7px] px-4 bg-white rounded-md cursor-default">...</li>
                <a href="#" class="text-xs text-dark/60 font-medium py-[7px] px-4 bg-white hover:bg-gray-100 rounded-md transition-all">Next</a>
            </div>
          </div> --}}
        </div>
    </div>
</x-layout>