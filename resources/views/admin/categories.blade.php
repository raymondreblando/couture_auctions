<x-layout>
    <x-slot:title>
        Categories
    </x-slot:title>

    <div class="min-h-screen bg-ash-gray">
        @include('partials.sidebar')
        @include('partials.topnav', ['title' => 'Categories'])

        <div class="w-full min-h-screen flex justify-center items-center pt-[100px] pl-[2rem] md:pl-[8rem] pr-[2rem]">
            <div class="w-[min(65rem,100%)]">
                <div class="bg-white rounded-t-md p-8 mb-2">
                    <p class="text-sm md:text-base font-semibold text-dark leading-none">Product Categories</p>
                    <p class="text-[11px] md:text-xs font-medium text-dark/60">Browse curated selections organized by categories, tailored to your fashion preferences</p>
                </div>
                <div class="grid md:grid-cols-2 gap-2">
                    <div id="category-wrapper" class="bg-white rounded-md p-8">
                        <form 
                            method="POST"
                            id="category-form"
                            class="flex gap-2 mb-4" 
                            autocomplete="off"
                        >
                            @csrf
                            <x-forms.input 
                                name="category_name"
                                placeholder="Category name"
                            />
                            <x-forms.button
                                class="w-max px-6"
                            >
                                Save
                            </x-forms.button>
                        </form>
                        <form 
                            method="POST"
                            id="update-category-form"
                            class="hidden flex gap-2 mb-4" 
                            autocomplete="off"
                        >
                            @csrf
                            @method('put')
                            <x-forms.input 
                                id="category-name"
                                name="category_name"
                                placeholder="Category name"
                            />
                            <x-forms.button
                                class="w-max px-6"
                            >
                                Save
                            </x-forms.button>
                        </form>

                        @forelse ($categories as $category)
                            <x-category.card
                                subtitle="Category"
                                button-class="update-category"
                                :title="$category->category_name"
                                :id="$category->category_id"
                            />
                        @empty
                            <x-category.category-empty 
                                title="No category found"
                            />
                        @endforelse
                    </div>
                    <div id="subcategory-wrapper" class="bg-white rounded-md p-8">
                        <form 
                            method="POST"
                            id="subcategory-form"
                            class="flex gap-2 mb-4" 
                            autocomplete="off"
                        >
                            @csrf
                            <x-forms.input 
                                name="subcategory_name"
                                placeholder="Subcategory name"
                            />
                            <x-forms.button
                                class="w-max px-6"
                            >
                                Save
                            </x-forms.button>
                        </form>
                        <form 
                            method="POST"
                            id="update-subcategory-form"
                            class="hidden flex gap-2 mb-4" 
                            autocomplete="off"
                        >
                            @csrf
                            @method('put')
                            <x-forms.input 
                                id="subcategory-name"
                                name="subcategory_name"
                                placeholder="Subcategory name"
                            />
                            <x-forms.button
                                class="w-max px-6"
                            >
                                Save
                            </x-forms.button>
                        </form>

                        @forelse ($subcategories as $subcategory)
                            <x-category.card
                                subtitle="Subcategory"
                                button-class="update-subcategory"
                                :title="$subcategory->subcategory_name"
                                :id="$subcategory->subcategory_id"
                            />
                        @empty
                            <x-category.category-empty 
                                title="No subcategory found"
                            />
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>