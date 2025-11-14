<!--product details start-->
<main class="lg:px-24 py-12">
    @if (session('success'))
        <div
            class="fixed top-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif

    @if (!$product)
        <div class="text-center py-12">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Product Not Found</h1>
            <p class="text-gray-600 mb-6">The product you're looking for doesn't exist.</p>
            <a href="{{ route('products') }}"
                class="bg-highlight text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition-colors">
                Back to Products
            </a>
        </div>
    @else
        <div>
            <section class="font-forum overflow-hidden lg:pb-12 pb-6 grid lg:grid-cols-2 lg:gap-20">
                <!-- Product Images -->
                {{-- <div class="grid gap-6 sticky top-20">
                    <!-- Main Image -->
                    <div class="flex justify-center">
                        <div
                            class="lg:h-[350px] lg:w-[500px] h-[250px] border border-gray-200 rounded-lg bg-gray-50 flex items-center justify-center">
                            @if ($selectedImage)
                                <!-- Test if image exists -->
                                <img alt="{{ $product->name }}" src="{{ asset('storage/' . $selectedImage) }}"
                                    class="w-full h-full object-contain object-center rounded-lg"
                                    onerror="console.log('Image failed to load: {{ $selectedImage }}'); this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div
                                    class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center hidden">
                                    <div class="text-center">
                                        <span class="text-gray-400 text-sm block">Image not found:</span>
                                        <span class="text-gray-500 text-xs block mt-1">"{{ $selectedImage }}"</span>
                                    </div>
                                </div>
                            @else
                                <div class="text-center">
                                    <span class="text-gray-400 text-sm block">No Image Selected</span>
                                    <span class="text-gray-500 text-xs block mt-1">selectedImage is:
                                        {{ $selectedImage ?? 'NULL' }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Thumbnails - Only show if we have multiple images -->
                    @if ($product->image && is_array($product->image) && count($product->image) > 1)
                        <div class="gap-4 flex items-center justify-center">
                            @foreach ($product->image as $image)
                                <div class="h-[80px] w-[80px] cursor-pointer border-2 rounded-lg {{ $selectedImage === $image ? 'border-highlight' : 'border-gray-200' }}"
                                    wire:click="selectImage('{{ $image }}')">
                                    <img alt="Thumbnail" src="{{ asset('storage/' . $image) }}"
                                        class="w-full h-full object-contain object-center rounded">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div> --}}
                <!-- Product Images -->

                <div class="grid gap-6">
                    <!-- Main Image -->
                    <div class="flex justify-center">
                        <div
                            class="lg:h-[400px] lg:w-[500px] h-[250px] border border-gray-200 rounded-lg bg-gray-50 overflow-hidden rounded-lg">
                            @if ($selectedImage)
                                <img alt="{{ $product->name }}" src="{{ $selectedImage }}"
                                    class="w-full h-full object-contain object-center "
                                    onerror="this.onerror=null; this.style.display='none'; document.getElementById('fallback-image').style.display='flex';">

                                <!-- Fallback when image fails to load -->
                                <div id="fallback-image"
                                    class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center hidden">
                                    <div class="text-center">
                                        <svg class="w-12 h-12 text-gray-400 mx-auto mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-gray-400 text-sm block">Image file not found</span>
                                        <span class="text-gray-500 text-xs block mt-1">Please re-upload the image</span>
                                    </div>
                                </div>
                            @else
                                <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">No Image Available</span>
                                </div>
                            @endif
                        </div>
                    </div>

                   
                    <!-- Thumbnails with Livewire - Show even if only one image -->
                    @if ($product->image && is_array($product->image) && count($product->image) > 0)
                        <div class="flex gap-4 justify-center items-center flex-wrap">
                            @foreach ($product->image as $image)
                                @php
                                    $thumbnailUrl = asset('storage/' . $image);
                                    $isActive = $selectedImage === $thumbnailUrl;
                                    $isSingleImage = count($product->image) === 1;
                                @endphp
                                <div class="h-20 w-20 cursor-pointer border-2 rounded-lg transition-all duration-200 hover:border-highlight hover:shadow-md {{ $isActive ? 'border-highlight shadow-md' : 'border-gray-300' }} {{ $isSingleImage ? 'opacity-100' : '' }}"
                                    wire:click="selectImage('{{ $thumbnailUrl }}')"
                                    title="{{ $isSingleImage ? 'Product Image' : 'Click to view' }}">
                                    <img alt="Thumbnail" src="{{ $thumbnailUrl }}"
                                        class="w-full h-full object-cover object-center rounded"
                                        onerror="this.src='https://via.placeholder.com/80x80/e5e7eb/9ca3af?text=Thumb'">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Product Info -->
                <div class="lg:mt-0 mt-4 sticky top-20">
                    <!-- Stock Status -->
                    @if ($product->stock_quantity == 0)
                        <div class="mb-4 bg-red-100 text-red-600 text-sm px-3 py-2 rounded-md inline-block">
                            Out of Stock
                        </div>
                    @elseif($product->stock_quantity < 10)
                        <div class="mb-4 bg-orange-100 text-orange-600 text-sm px-3 py-2 rounded-md inline-block">
                            Low Stock - Only {{ $product->stock_quantity }} {{ $product->unit_type }} left
                        </div>
                    @endif

                    <h3 class="text-2xl font-medium font-poppins">{{ $product->name }}</h3>
                    <p class="text-gray-500 text-sm font-inter py-3">
                        {{ $product->description ?? 'No description available.' }}</p>

                    <div class="flex gap-1 items-center py-2">
                        <h3 class="text-2xl font-medium font-poppins text-highlight">NPR.
                            {{ number_format($product->price, 2) }}</h3>
                        <p class="text-gray-500 text-sm font-inter">/per {{ $product->unit_type }}</p>
                    </div>

                    <!-- Category Info -->
                    <div class="flex items-center gap-2 py-2">
                        <span class="text-gray-600 text-sm">Category:</span>
                        <span class="text-highlight font-medium">{{ $product->category->name ?? 'No category' }}</span>
                    </div>

                    <!-- Quantity Selector -->
                    <div class="my-4">
                        <h3 class="text-xl font-medium font-poppins">Quantity</h3>

                        <div class="flex items-center gap-4 mt-4">
                            <div class="border border-gray-200 rounded-md p-1 grid grid-cols-3 gap-1 w-[120px]">
                                <!-- Decrease -->
                                <button wire:click="decreaseQuantity"
                                    class="p-1 rounded-md bg-gray-200 flex items-center justify-center cursor-pointer hover:bg-gray-300 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                    </svg>
                                </button>

                                <!-- Quantity Display -->
                                <div class="flex items-center justify-center font-semibold text-gray-800">
                                    <span>{{ $quantity }}</span>
                                </div>

                                <!-- Increase -->
                                <button wire:click="increaseQuantity"
                                    class="p-1 rounded-md bg-gray-200 flex items-center justify-center cursor-pointer hover:bg-gray-300 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Manual Input -->
                            <div class="flex items-center gap-2">
                                <span class="text-gray-600 text-sm">or enter:</span>
                                <input type="number" wire:model.live="quantity"
                                    step="{{ $unitType === 'kg' ? '0.5' : '1' }}"
                                    min="{{ $unitType === 'kg' ? '0.5' : '1' }}"
                                    class="w-20 p-1 border border-gray-300 rounded text-center focus:border-highlight focus:ring-0">
                            </div>
                        </div>

                        <p class="text-gray-500 text-xs mt-2">
                            Unit: {{ $product->unit_type }}
                            @if ($unitType === 'kg')
                                (increments of 0.5)
                            @else
                                (whole numbers only)
                            @endif
                        </p>

                        <!-- Price Calculation -->
                        <div class="mt-3 p-3 bg-gray-50 rounded-md">
                            <p class="text-sm text-gray-700">
                                Total: <span class="font-semibold text-highlight">
                                    NPR. {{ number_format($product->price * $quantity, 2) }}
                                </span>
                            </p>
                            <p class="text-xs text-gray-500 mt-1">
                                {{ $quantity }} {{ $product->unit_type }} × NPR.
                                {{ number_format($product->price, 2) }}
                            </p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-6 mt-10">
                        <button wire:click="buyNow"
                            class="outline-none border-highlight border w-[160px] py-3 flex gap-3 rounded-full items-center justify-center text-highlight px-5 hover:bg-highlight hover:text-white transition-colors {{ $product->stock_quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                            Buy Now
                        </button>
                        <button wire:click="addToCart"
                            class="outline-none bg-highlight w-[160px] py-3 flex gap-3 rounded-full items-center justify-center text-white px-5 hover:bg-opacity-90 transition-colors {{ $product->stock_quantity == 0 ? 'opacity-50 cursor-not-allowed' : '' }}"
                            {{ $product->stock_quantity == 0 ? 'disabled' : '' }}>
                            Add to Cart
                        </button>
                    </div>

                    <!-- Additional Info -->
                    <div class="mt-8 flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4 text-gray-500">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                        </svg>
                        <p class="text-gray-500 text-xs font-inter py-3">
                            @if ($product->stock_quantity > 0)
                                Dispatch in 1-2 days
                            @else
                                Currently out of stock
                            @endif
                        </p>
                    </div>

                    <!-- Product Details -->
                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <h4 class="text-lg font-medium font-poppins mb-3">Product Details</h4>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <span class="text-gray-600">Category:</span>
                                <span class="ml-2 font-medium">{{ $product->category->name ?? 'No category' }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Unit Type:</span>
                                <span class="ml-2 font-medium capitalize">{{ $product->unit_type }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Stock:</span>
                                <span
                                    class="ml-2 font-medium {{ $product->stock_quantity > 0 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->stock_quantity > 0 ? $product->stock_quantity . ' ' . $product->unit_type . ' available' : 'Out of Stock' }}
                                </span>
                            </div>
                            <div>
                                <span class="text-gray-600">Status:</span>
                                <span
                                    class="ml-2 font-medium capitalize {{ $product->status === 'available' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $product->status }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
</main>
