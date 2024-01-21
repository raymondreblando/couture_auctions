<div class="filter-container">
    <div class="category-list static md:fixed top-32 left-[100%-68rem] flex flex-col gap-4">
        <p class="font-medium text-dark">Categories</p>
        <ul class="flex flex-col gap-3 mb-6">
            <x-radio
                class-name="category-radio selected"
                title="All Categories"
                value=""
            />
            @foreach ($categories as $category)
                <x-radio
                    class-name="category-radio"
                    title="{{ $category->category_name }}"
                    value="{{ $category->category_id }}"
                />
            @endforeach
        </ul>
        <p class="font-medium text-dark">Subcategories</p>
        <ul class="flex flex-col gap-3 mb-6">
            <x-radio
                class-name="subcategory-radio selected"
                title="All Subcategories"
                value=""
            />
            @foreach ($subcategories as $subcategory)
                <x-radio
                    class-name="subcategory-radio"
                    title="{{ $subcategory->subcategory_name }}"
                    value="{{ $subcategory->subcategory_id }}"
                />
            @endforeach
        </ul>
        <p class="font-medium text-dark">Price</p>
        <ul class="flex flex-col gap-3 mb-6">
            <x-radio
                class-name="price-radio selected"
                title="All Prices"
                value=""
            />
            <x-radio
                class-name="price-radio"
                title="P0-P200"
                value="0-200"
            />
            <x-radio
                class-name="price-radio"
                title="P200-P500"
                value="200-500"
            />
            <x-radio
                class-name="price-radio"
                title="Less than 1,000"
                value="0-1000"
            />
            <x-radio
                class-name="price-radio"
                title="More than 1,000"
                value="1000-1000000"
            />
        </ul>
    </div>
</div>