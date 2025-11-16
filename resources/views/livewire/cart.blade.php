<div class="px-24 py-12">
    <div class="flex flex-wrap justify-between items-center gap-3 mb-8">
        <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800">
            Review Your Cart ({{ $itemCount }} items)
        </h2>
        <a class="text-sm font-medium text-highlight/80 hover:text-highlight" href="{{ route('products') }}">
            Continue Shopping
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($itemCount == 0)
        <div class="text-center py-12">
            <svg class="w-24 h-24 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5.5M7 13l2.5 5.5m5.5-5.5h5.5m-5.5 0V19a2 2 0 104 0v-1.5m-4-4.5h4"></path>
            </svg>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">Your cart is empty</h3>
            <p class="text-gray-500 mb-4">Add some products to get started!</p>
            <a href="{{ route('products') }}" class="bg-highlight text-white px-6 py-2 rounded-lg hover:bg-opacity-90 transition-colors">
                Browse Products
            </a>
        </div>
    @else
    <div class="grid grid-cols-3 gap-8">
        <div class="col-span-2 space-y-6">
            <!-- Vendor Sections -->
            @foreach($groupedCart as $vendorId => $vendorData)
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <h3 class="text-md font-normal font-poppins leading-tight tracking-normal pb-3 border-b border-highlight/20 text-gray-800 flex justify-end">
                    <span class="text-gray-500 text-sm px-2">shipped by</span>{{ $vendorData['vendor_name'] }}
                </h3>

                <div class="divide-y divide-gray-200">
                    @foreach($vendorData['items'] as $item)
                    <div class="flex gap-4 px-0 py-5 justify-between items-center">
                        <div class="flex items-start gap-4 flex-1">
                            <div class="rounded-lg h-20 w-20 flex-shrink-0 bg-gray-100 flex items-center justify-center">
                                @if($item['image'])
                                    <img src="{{ $item['image'] }}" 
                                         alt="{{ $item['name'] }}"
                                         class="w-full h-full object-cover object-center rounded">
                                @else
                                    <span class="text-gray-400 text-xs">No Image</span>
                                @endif
                            </div>
                            <div class="flex flex-1 flex-col justify-center">
                                <p class="text-gray-800 text-base font-medium leading-normal">{{ $item['name'] }}</p>
                                <p class="text-gray-600 text-sm font-normal leading-normal">{{ $item['quantity'] }} {{ $item['unit_type'] }}</p>
                                <p class="text-highlight text-sm font-bold leading-normal mt-1">
                                    NPR. {{ number_format($item['price'], 2) }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-col items-end gap-2">
                            <div class="flex items-center gap-2 text-gray-800">
                                <button wire:click="updateQuantity({{ $item['product_id'] }}, {{ $item['quantity'] - 1 }})"
                                    class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-highlight/20 cursor-pointer hover:bg-highlight/30 transition-colors">-</button>
                                <input 
                                    wire:change="updateQuantity({{ $item['product_id'] }}, $event.target.value)"
                                    class="text-base font-medium leading-normal w-8 p-0 text-center bg-transparent focus:outline-0 focus:ring-0 focus:border-none border-none [appearance:textfield] [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                    type="number" 
                                    value="{{ $item['quantity'] }}" 
                                    min="1" />
                                <button wire:click="updateQuantity({{ $item['product_id'] }}, {{ $item['quantity'] + 1 }})"
                                    class="text-base font-medium leading-normal flex h-7 w-7 items-center justify-center rounded-full bg-highlight/20 cursor-pointer hover:bg-highlight/30 transition-colors">+</button>
                            </div>
                            <button wire:click="removeFromCart({{ $item['product_id'] }})" 
                                    class="text-xs text-red-500 hover:underline">Remove</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach

            <!-- Clear Cart Button -->
            <div class="text-center">
                <button wire:click="clearCart" 
                        class="text-red-500 hover:text-red-700 text-sm font-medium hover:underline">
                    Clear Entire Cart
                </button>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="">
            <div class="sticky top-28 space-y-6">
                <div class="border border-gray-200 rounded-xl p-6 bg-white shadow-sm">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Order Summary</h3>
                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>NPR. {{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span>Shipping</span>
                            <div class="flex items-center gap-1">
                                <span>NPR. 0.00</span>
                                <span class="material-symbols-outlined text-xs cursor-pointer" title="Free shipping">info</span>
                            </div>
                        </div>
                        <div class="flex justify-between">
                            <span>Order Items</span>
                            <span>{{ $itemCount }} items</span>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 my-4"></div>
                    <div class="flex justify-between font-bold text-lg text-gray-800">
                        <span>Total</span>
                        <span>NPR. {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('checkout') }}">
                        <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-highlight text-white text-base font-bold leading-normal tracking-[0.015em] shadow-lg hover:bg-opacity-90 transition-opacity">
                            <span class="truncate">Proceed to Payment</span>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>