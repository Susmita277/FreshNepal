<div class="px-24 py-12">
    {{-- Back button --}}
    <a href="{{ route('order-history') }}"
        class="flex items-center gap-2 text-sm text-gray-500 hover:text-highlight font-inter mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Back to My Orders
    </a>

    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl tracking-relaxed font-medium font-poppins text-gray-800">
                Order #{{ $order->id }}
            </h2>
            <p class="text-sm text-gray-400 font-inter mt-1">
                Placed on {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y, h:i A') }}
            </p>
        </div>
        <span class="px-4 py-2 rounded-full text-sm font-medium font-inter
            @if($order->status === 'delivered') bg-green-100 text-green-700
            @elseif($order->status === 'cancelled') bg-red-100 text-red-600
            @elseif($order->status === 'shipped') bg-blue-100 text-blue-600
            @elseif($order->status === 'processing') bg-purple-100 text-purple-600
            @elseif($order->status === 'confirmed') bg-indigo-100 text-indigo-600
            @else bg-yellow-100 text-yellow-700
            @endif">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <div class="grid grid-cols-3 gap-8">
        {{-- Order Items --}}
        <div class="col-span-2 space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold font-poppins text-gray-800 mb-4">Order Items</h3>
                <div class="space-y-4">
                    @foreach ($order->items as $item)
                        <div class="flex items-center gap-4 border-b border-gray-100 pb-4 last:border-b-0 last:pb-0">
                            <div class="w-16 h-16 bg-gray-100 rounded-xl overflow-hidden shrink-0">
                                @if ($item->product && $item->product->first_image_url)
                                    <img src="{{ $item->product->first_image_url }}"
                                        class="w-full h-full object-contain">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-300 text-xs">N/A</div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="font-medium font-poppins text-gray-800">
                                    {{ $item->product->name ?? 'Product' }}
                                </p>
                                <p class="text-sm text-gray-400 font-inter mt-1">
                                    {{ $item->quantity }} {{ $item->product->unit_type ?? '' }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold font-poppins text-highlight">
                                    NPR {{ number_format($item->price * $item->quantity, 2) }}
                                </p>
                                <p class="text-xs text-gray-400 font-inter mt-1">
                                    NPR {{ number_format($item->price, 2) }} each
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Delivery Address --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold font-poppins text-gray-800 mb-4">Delivery Address</h3>
                <div class="text-sm font-inter text-gray-600 space-y-1">
                    <p class="font-medium text-gray-800">{{ $order->user->name }}</p>
                    <p>{{ $order->delivery_address }}</p>
                    <p>{{ $order->area }}, {{ $order->city }}</p>
                </div>
            </div>
        </div>

        {{-- Order Summary --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold font-poppins text-gray-800 mb-4">Order Summary</h3>
                <div class="space-y-3 text-sm font-inter text-gray-600">
                    <div class="flex justify-between">
                        <span>Subtotal</span>
                        <span>NPR {{ number_format($order->subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Delivery Charge</span>
                        <span>NPR {{ number_format($order->delivery_charge, 2) }}</span>
                    </div>
                    <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-gray-800 text-base">
                        <span>Total</span>
                        <span class="text-highlight">NPR {{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>

            {{-- Payment Info --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-semibold font-poppins text-gray-800 mb-4">Payment Info</h3>
                <div class="text-sm font-inter text-gray-600 space-y-2">
                    <div class="flex justify-between">
                        <span>Method</span>
                        <span class="font-medium text-gray-800">{{ $order->payment_method }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Status</span>
                        <span class="font-medium
                            @if($order->status === 'delivered') text-green-600
                            @elseif($order->status === 'cancelled') text-red-600
                            @else text-yellow-600
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            {{-- Continue Shopping --}}
            <a href="{{ route('products') }}"
                class="flex w-full items-center justify-center rounded-xl h-11 px-4 border border-gray-300 text-gray-700 text-sm font-bold font-poppins hover:bg-gray-50 transition-colors">
                Continue Shopping
            </a>
        </div>
    </div>
</div>