<div class="px-24 py-12">
    <h2
        class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800 border-b border-gray-200 pb-8">
        All products in one place
        @if ($this->search)
            <span class="text-lg text-gray-600"> - Search: "{{ $this->search }}"</span>
        @endif
    </h2>
    <div class="grid grid-cols-5 gap-10 relative mt-8" >
        <!-- Filter Sidebar -->
        <div class="w-full sticky top-10 left-0 bottom-0 h-fit">
            <div class="flex justify-between items-center">
                <h4 class="text-lg tracking-tight font-medium font-poppins">Filter Options</h4>
                <button wire:click="clearFilters" type="button"
                    class="text-sm text-highlight hover:underline {{ empty($selectedCategories) && empty($priceSort) && empty($search) ? 'opacity-50 cursor-not-allowed' : '' }}"
                    {{ empty($selectedCategories) && empty($priceSort) && empty($search) ? 'disabled' : '' }}>
                    Clear all
                </button>
            </div>

            <!-- Category Filter -->
            <ul class="mt-6">
                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800 mb-2">Category</h4>
                @foreach ($categories as $category)
                    <li class="flex gap-x-2 my-2 items-center">
                        <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}"
                            id="category_{{ $category->id }}"
                            class="rounded border-gray-300 text-highlight focus:ring-highlight">
                        <label for="category_{{ $category->id }}"
                            class="text-md tracking-relaxed font-medium font-inter text-gray-800 cursor-pointer">
                            {{ $category->name }}
                            <span
                                class="text-xs text-gray-500 ml-1">({{ $category->products_count ?? $category->products()->where('status', 'available')->count() }})</span>
                        </label>
                    </li>
                @endforeach
            </ul>

            <!-- Price Filter -->
            <ul class="mt-6">
                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800 mb-2">Price</h4>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="radio" wire:model.live="priceSort" value="high_to_low" id="price_high_low"
                        name="priceSort" class="border-gray-300 text-highlight focus:ring-highlight">
                    <label for="price_high_low"
                        class="text-md tracking-relaxed font-medium font-inter text-gray-800 cursor-pointer">
                        High to low
                    </label>
                </li>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="radio" wire:model.live="priceSort" value="low_to_high" id="price_low_high"
                        name="priceSort" class="border-gray-300 text-highlight focus:ring-highlight">
                    <label for="price_low_high"
                        class="text-md tracking-relaxed font-medium font-inter text-gray-800 cursor-pointer">
                        Low to high
                    </label>
                </li>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="radio" wire:model.live="priceSort" value="" id="price_none" name="priceSort"
                        class="border-gray-300 text-highlight focus:ring-highlight">
                    <label for="price_none"
                        class="text-md tracking-relaxed font-medium font-inter text-gray-800 cursor-pointer">
                        None
                    </label>
                </li>
            </ul>

            @if (!empty($selectedCategories) || !empty($priceSort))
                <div class="mt-6 p-3 bg-gray-50 rounded-md">
                    <h5 class="text-sm font-medium text-gray-700 mb-2">Active Filters:</h5>
                    @if (!empty($selectedCategories))
                        <div class="text-xs text-gray-600">
                            Categories:
                            @foreach ($selectedCategories as $categoryId)
                                @php $category = $categories->firstWhere('id', $categoryId); @endphp
                                {{ $category->name }}{{ !$loop->last ? ',' : '' }}
                            @endforeach
                        </div>
                    @endif
                    @if ($priceSort === 'high_to_low')
                        <div class="text-xs text-gray-600">Price: High to Low</div>
                    @elseif($priceSort === 'low_to_high')
                        <div class="text-xs text-gray-600">Price: Low to High</div>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-span-4">
            <div class="mb-4 text-sm text-gray-600">
                Showing {{ $products->count() }} product(s)
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" >
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-3xl p-5 h-[280px] flex flex-col items-center relative shadow-sm hover:shadow-md transition-shadow">

                        @if ($product->stock_quantity == 0)
                            <div
                                class="absolute top-2 right-2 bg-red-100 text-red-600 text-xs px-2 py-1 rounded-full font-medium">
                                Out of Stock
                            </div>
                        @elseif($product->stock_quantity < 10)
                            <div
                                class="absolute top-2 right-2 bg-orange-100 text-orange-600 text-xs px-2 py-1 rounded-full font-medium">
                                Low Stock
                            </div>
                        @endif

                        <a href="{{ route('product-details', $product->slug) }}" class="w-full">
                            <div class="h-[120px] w-full flex justify-center mb-3">
                                @if ($product->first_image_url)
                                    <img src="{{ $product->first_image_url }}" alt="{{ $product->name }}"
                                        class="object-contain w-full h-full hover:scale-105 transition-transform">
                                @else
                                    <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-400 text-sm">No Image</span>
                                    </div>
                                @endif
                            </div>
                        </a>

                        <div class="mt-2 flex-1 w-full text-center">
                            <h3 class="text-lg font-medium font-poppins line-clamp-1">
                                {{ $product->name }}
                            </h3>
                            <p class="font-inter tracking-tight line-spacing-1 font-medium text-gray-500 text-sm mt-1">
                                {{ $product->category->name }} / {{ $product->unit_type }}
                            </p>
                        </div>

                        <div class="flex items-center justify-between w-full mt-3">
                            <h4 class="text-md font-medium font-poppins text-highlight">
                                NPR. {{ number_format($product->price, 2) }}
                            </h4>

                          
                            <button wire:click="addToCart({{ $product->id }})" type="button"
                                class="bg-highlight text-white p-2 rounded-full hover:bg-opacity-90 transition-colors {{ $product->stock_quantity == 0 ? 'bg-gray-400 cursor-not-allowed' : '' }}"
                                {{ $product->stock_quantity == 0 ? 'disabled' : '' }} wire:loading.attr="disabled">
                                <x-heroicon-o-plus-circle class="w-5 h-5" />
                            </button>
                        </div>

                        @if (false)
                            <div
                                class="absolute top-2 left-2 w-fit h-fit rounded-full p-1 text-white bg-green-400 text-xs tracking-tight font-inter">
                                20% off
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            @if ($products->count() == 0)
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No products found matching your criteria.</p>
                    @if (!empty($selectedCategories) || !empty($priceSort) || !empty($search))
                        <button wire:click="clearFilters" class="mt-4 text-highlight hover:underline" type="button">
                            Clear filters to see all products
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
