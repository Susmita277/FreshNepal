<div class="py-12 px-24 ">
    <div class="grid grid-cols-2 gap-30">
        <div>
            <h1 class="font-poppins font-medium text-5xl tracking-normal leading-normal">Connecting You With Fresh
                Harvests
            </h1>
            <p class="flex text-sm font-inter tracking-relaxed line-spacing-1 font-medium text-gray-700 py-2">
                Get fresh fruits and vegetables from many trusted sellers in one place.
                Enjoy healthy and tasty food every day.
            </p>
            <a href="{{ route('products') }}">
                <div
                    class="bg-highlight  pl-8 pr-1  w-[160px] py-2 flex gap-3 rounded-full mt-8 items-center justify-center cursor-pointer">
                    <p class="text-sm font-poppins font-medium text-white">Buy Now</p>
                    <div class="w-8 h-8 rounded-full bg-white flex justify-center items-center p-1">
                        <div class="h-3 w-3"> <img src="vegetables.png" class="object-cover w-full h-full"></div>
                    </div>
                </div>
            </a>

        </div>
        <div class="w-full h-[400px] transfrom -translate-y-[5%] ">
            <img src="banner.png" class="w-full h-full object-cover  ">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10">
        <div class="grid grid-cols-2 gap-8 rounded-md bg-green-100 h-[200px]">
            <div class="p-8">
                <span class="text-highlight text-sm font-inter tracking-relaxed">vegetables</span>
                <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins py-2">Vegetables
                    Collections</h2>
                <button
                    class="outline-none border-none bg-white rounded-full px-5 py-3 flex justify-center text-center text-xs font-poppins">Shop
                    Now</button>
            </div>
            <div class="h-[200px] w-full overflow-hidden">
                <img src="vegetable-collection.png" class="w-full h-full object-contain">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8 rounded-md bg-orange-100 h-[200px]">
            <div class="p-8">
                <span class="text-highlight text-sm font-inter tracking-relaxed">fruits</span>
                <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins py-2">Fresh Fruits
                    Collections</h2>
                <button
                    class="outline-none border-none bg-white rounded-full px-5 py-3 flex justify-center text-center text-xs font-poppins">Shop
                    Now</button>
            </div>
            <div class="h-[200px] w-full overflow-hidden">
                <img src="fruits.png" class="w-full h-full object-contain">
            </div>
        </div>
    </div>

    <div class="py-12">
        @foreach ($categoriesWithProducts as $category)
            <div class="mb-16">
                <div class="flex justify-between items-center mb-8">
                    <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins">
                        {{ $category->name }}
                    </h2>
                    <a href="{{ route('products', $category->slug) }}"
                        class="gap-2 border rounded-sm border-[#000000] px-5 py-2 flex hover:border-none hover:bg-highlight hover:text-white transition-all smooth cursor-pointer">
                        <p class="text-xs font-poppins">View More</p>
                        <x-heroicon-s-arrow-up-right class="w-4 h-4" />
                    </a>
                </div>

                <div class="pt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                    @foreach ($category->products as $product)
                        <div
                            class="bg-white rounded-3xl p-5 h-fit flex flex-col items-center relative shadow-sm hover:shadow-md transition-shadow {{ $product->stock_quantity == 0 ? 'opacity-70' : '' }}">

                            @if ($product->stock_quantity == 0)
                                <div
                                    class="absolute top-2 left-2 z-60 bg-red-100 text-red-600 text-xs p-1 rounded-full font-inter font-normal tracking-tight">
                                    Out of Stock
                                </div>
                            @elseif($product->stock_quantity < 10)
                                <div
                                    class="absolute top-2 left-2 z-60 bg-orange-100 text-highlight text-xs p-1 rounded-full font-inter font-normal">
                                    Low Stock
                                </div>
                            @endif



                            <a href={{ route('product-details', $product->slug) }}>
                                <div class="h-[100px] w-full flex justify-center">
                                    @if ($product->first_image_url)
                                        <img src="{{ $product->first_image_url }}" alt="{{ $product->name }}"
                                            class="object-contain w-full h-full {{ $product->stock_quantity == 0 ? 'grayscale' : '' }}"
                                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                        <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center {{ $product->stock_quantity == 0 ? 'grayscale' : '' }}"
                                            style="display: none;">
                                            <span class="text-gray-400 text-sm">Image not found</span>
                                        </div>
                                    @else
                                        <div
                                            class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center {{ $product->stock_quantity == 0 ? 'grayscale' : '' }}">
                                            <span class="text-gray-400 text-sm">No Image</span>
                                        </div>
                                    @endif
                                </div>
                            </a>


                            <!-- Product Info -->
                            <div class="mt-2 flex-1 w-full">
                                <h3
                                    class="text-lg font-medium font-poppins text-center line-clamp-1 {{ $product->stock_quantity == 0 ? 'text-gray-500' : '' }}">
                                    {{ $product->name }}
                                </h3>
                                <p
                                    class="font-inter tracking-tight line-spacing-1 font-medium text-gray-500 text-sm text-center mt-1">
                                    {{ $category->name }} / {{ $product->unit_type }}
                                </p>
                            </div>

                            <!-- Price and Add Button -->
                            <div class="flex flex-col items-center  w-full mt-2">
                                <h4
                                    class="text-md font-medium font-poppins {{ $product->stock_quantity == 0 ? 'text-gray-400' : 'text-highlight' }}">
                                    NPR. {{ number_format($product->price, 2) }}
                                </h4>

                              
                                <button wire:click="addToCart({{ $product->id }})"
                                    class="bg-highlight text-white p-2 rounded-full cursor-pointer hover:bg-opacity-90 transition-colors {{ $product->stock_quantity == 0 ? 'bg-gray-400 cursor-not-allowed' : '' }}"
                                    {{ $product->stock_quantity == 0 ? 'disabled' : '' }} wire:loading.attr="disabled">
                                    <x-heroicon-o-plus-circle class="w-5 h-5" />
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        @if ($categoriesWithProducts->count() == 0)
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">No products available yet.</p>
            </div>
        @endif
    </div>

</div>
