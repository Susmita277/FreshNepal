<div class="relative">
    @if (session()->has('message'))
        <div class="fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="fixed top-20 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="fixed top-20 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    <div class="px-24 py-12">
        @if (!Auth::check())
            <div class="bg-yellow-100 border border-yellow-400 text-yellow-800 px-4 py-3 rounded mb-6">
                <p>Please <a href="{{ route('user-login') }}" class="underline font-semibold">login</a> to proceed with
                    checkout.</p>
            </div>
        @endif

        <div class="flex items-center gap-2 pb-4">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-highlight">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
            <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800">
                Checkout
            </h2>
        </div>

        <!-- MAIN FORM - Wrap entire checkout content -->
        <form wire:submit.prevent="placeOrder">
            <div class="grid grid-cols-3 justify-center gap-10">
                <div class="col-span-2">
                    <div class="mb-8 bg-white px-8 py-5 rounded-md shadow-sm">
                        <h3 class="text-xl font-medium font-poppins text-gray-700 mb-6">Delivery Address</h3>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="relative flex w-full flex-col justify-center gap-1">
                                <label class="w-fit text-gray-500 font-medium text-md font-[var(--font-poppins)] py-2">
                                    City/District *
                                </label>
                                <input type="text" wire:model.defer="city"
                                    class="w-full text-gray-700 appearance-none rounded-radius border border-gray-200 rounded-md bg-surface-alt px-4 py-3 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-highlight @error('city') border-red-500 @enderror"
                                    placeholder="Enter your city">
                                @error('city')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Area Input -->
                            <div class="relative flex w-full flex-col justify-center gap-1">
                                <label class="w-fit text-gray-500 font-medium text-md font-[var(--font-poppins)] py-2">
                                    Area *
                                </label>
                                <input type="text" wire:model.defer="area"
                                    class="w-full text-gray-700 appearance-none rounded-radius border border-gray-200 rounded-md bg-surface-alt px-4 py-3 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-highlight @error('area') border-red-500 @enderror"
                                    placeholder="Enter your area">
                                @error('area')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="py-6">
                            <h3 class="text-xl font-medium font-poppins text-gray-700 mb-4">Payment Method</h3>
                            <div class="flex gap-3">
                                <div class="relative">
                                    <div
                                        class="rounded-xl px-8 py-4 justify-center flex flex-col items-center gap-2 border-2 border-highlight w-[200px] h-[100px] bg-highlight/5 transition-all smooth">
                                        <div class="w-[50px] h-[50px]">
                                            <img src="{{ asset('money.png') }}" class="w-full h-full object-contain">
                                        </div>
                                        <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-700">
                                            Cash on Delivery
                                        </h4>
                                    </div>
                                    <div
                                        class="absolute -top-2 -right-2 bg-highlight text-white rounded-full w-6 h-6 flex items-center justify-center">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-8 bg-white p-6 rounded-lg shadow-sm">
                        <h3 class="text-xl font-medium font-poppins text-gray-700 mb-6">Order Items</h3>

                        <div class="space-y-4">
                            @forelse($cartItems as $item)
                                <div
                                    class="flex gap-4 bg-transparent py-4 justify-between border-b border-gray-100 last:border-b-0">
                                    <div class="flex items-start gap-4 flex-1">
                                        <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg h-20 w-20 flex-shrink-0"
                                            style='background-image: url("{{ $item['image'] ?? 'https://via.placeholder.com/80' }}")'>
                                        </div>
                                        <div class="flex flex-1 flex-col">
                                            <p class="text-gray-800 text-base font-medium leading-normal">
                                                {{ $item['name'] }}
                                            </p>
                                            <p class="text-highlight/80 text-sm font-normal leading-normal">
                                                {{ $item['quantity'] }} {{ $item['unit_type'] }}
                                            </p>
                                            <p class="text-gray-500 text-sm mt-1">
                                                Vendor: {{ $item['vendor_name'] ?? 'Unknown Vendor' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800">
                                            NPR {{ number_format($item['price'] * $item['quantity'], 2) }}
                                        </h4>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <p class="text-gray-500">No items in cart</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="">
                    <div class="sticky top-28 space-y-6">
                        <div class="border border-highlight/20 rounded-xl p-6 bg-white shadow-sm">
                            <h3 class="text-xl font-bold mb-4 text-gray-800">Order Summary</h3>
                            <div class="space-y-3 text-sm text-gray-600">
                                <div class="flex justify-between">
                                    <span>Subtotal ({{ $this->getTotalItems() }} items)</span>
                                    <span>NPR {{ number_format($subtotal, 2) }}</span>
                                </div>
                                <div class="flex justify-between items-center">
                                    <span>Delivery Charge</span>
                                    <span>NPR {{ number_format($deliveryCharge, 2) }}</span>
                                </div>
                            </div>
                            <div class="border-t border-highlight/20 my-4"></div>
                            <div class="flex justify-between font-bold text-lg text-gray-800">
                                <span>Total</span>
                                <span>NPR {{ number_format($total, 2) }}</span>
                            </div>
                        </div>

                        <div class="space-y-4">
                           <button type="submit" wire:loading.attr="disabled"
                                class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-highlight text-white text-base font-bold leading-normal tracking-[0.015em] shadow-lg hover:opacity-90 transition-opacity disabled:opacity-50 disabled:cursor-not-allowed">
                                <span class="truncate">Place Order</span>
                               
                        </button>

                            <a href="{{ route('products') }}"
                                class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 border border-gray-300 text-gray-700 text-base font-bold leading-normal tracking-[0.015em] hover:bg-gray-50 transition-colors">
                                <span class="truncate">Continue Shopping</span>
                            </a>
                        </div>

                        <div class="text-center text-xs text-gray-500">
                            <div class="flex items-center justify-center gap-2">
                                <svg class="w-4 h-4 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span>Secure Checkout • Your information is safe</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>