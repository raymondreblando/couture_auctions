<x-layout>
    <x-slot:title>
        Update Product
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Update Product'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <form 
                method="POST"
                id="update-product-form"
                autocomplete="off" 
                class="w-[min(62rem,100%)]"
                enctype="multipart/form-data"
                data-id="{{ $product->product_id }}"
            >
                @csrf
                @method('put')
                <div class="flex items-center justify-between gap-4 bg-white rounded-t-md p-8 mb-2">
                    <div>
                        <p class="text-sm md:text-base font-semibold text-dark leading-none">
                            Update Product
                        </p>
                        <p class="text-[11px] md:text-xs font-medium text-dark/60">
                            Manage and enhance your product details.
                        </p>
                    </div>
                    <x-forms.button
                        class="w-max 2xl:h-max py-3 px-4"
                    >
                        <i class="ri-checkbox-circle-fill"></i>
                        Save
                    </x-forms.button>
                </div>
                <div class="grid sm:grid-cols-2 gap-6 bg-white rounded-b-md overflow-hidden">
                    <div class="upload-container h-[491px] relative bg-gray-100 cursor-pointer">
                        <input type="file" name="product_image" class="upload-input" hidden>
                        <img 
                            src="{{ asset('storage/product_images/' . $product->productimage->image) }}" 
                            alt="{{ $product->product_name }}" 
                            class="upload-preview w-full h-full object-contain pointer-events-none"
                        >
                        <div class="icon absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 pointer-events-none" hidden>
                            <img src="{{ asset('images/photo.svg') }}" alt="image" class="w-8 h-8 mx-auto mb-2 pointer-events-none">
                            <p class="text-[10px] md:text-xs font-medium pointer-events-none text-center text-gray-400">Upload Product Image</p>
                        </div>
                    </div>
                    <div class="py-6 pr-4">
                        <div class="grid sm:grid-cols-2 gap-3">
                            <div class="sm:col-span-2">
                                <x-forms.label
                                    for="#product-name"
                                >
                                    Product Name
                                </x-forms.label>
                                <x-forms.input 
                                    id="product-name"
                                    name="product_name"
                                    placeholder="Enter product name"
                                    :value="$product->product_name"
                                />
                            </div>
                            <div>
                                <x-forms.label
                                    for="#category"
                                >
                                    Category
                                </x-forms.label>
                                <x-forms.select 
                                    id="category"
                                    name="category_id"
                                    title="Category"
                                    :options="$categories"
                                    :selected="$product->category->category_id"
                                />
                            </div>
                            <div>
                                <x-forms.label
                                    for="#subcategory"
                                >
                                    Subcategory
                                </x-forms.label>
                                <x-forms.select 
                                    id="subcategory"
                                    name="subcategory_id"
                                    title="Subcategory"
                                    :options="$subcategories"
                                    :selected="$product->subcategory->subcategory_id"
                                />
                            </div>
                            <div>
                                <x-forms.label
                                    for="#starting-price"
                                >
                                    Starting Price
                                </x-forms.label>
                                <x-forms.input 
                                    type="number"
                                    id="starting-price"
                                    name="starting_price"
                                    placeholder="Enter starting price"
                                    :value="$product->starting_price"
                                />
                            </div>
                            <div>
                                <x-forms.label
                                    for="#bid-end-date"
                                >
                                    Bid End Date
                                </x-forms.label>
                                <x-forms.input 
                                    type="datetime-local"
                                    id="bid-end-date"
                                    name="bid_end_date"
                                    :value="$product->bid_end_date"
                                />
                            </div>
                            <div class="sm:col-span-2">
                                <x-forms.label
                                    for="#product-description"
                                >
                                    Product Description
                                </x-forms.label>
                                <x-forms.text-area 
                                    id="product-description"
                                    name="product_description"
                                    placeholder="Product description"
                                >{{ $product->product_description }}</x-forms.text-area>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layout>