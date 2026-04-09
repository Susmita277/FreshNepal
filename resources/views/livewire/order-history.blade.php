
<div class="px-24 py-12">
    <h2 class="text-2xl tracking-relaxed font-medium font-poppins text-gray-800 border-b border-gray-200 pb-6 mb-8">
        My Orders
    </h2>

    @if ($orders->isEmpty())
        <div class="text-center py-16">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
            </svg>
            <p class="text-gray-500 text-lg font-inter">You haven't placed any orders yet.</p>
            <a href="{{ route('products') }}" class="mt-4 inline-block bg-highlight text-white px-6 py-2 rounded-lg text-sm font-medium hover:opacity-90">
                Start Shopping
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach ($orders as $order)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                    {{-- Order Header --}}
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <h3 class="text-lg font-semibold font-poppins text-gray-800">
                                Order #{{ $order->id }}
                            </h3>
                            <p class="text-sm text-gray-400 font-inter mt-1">
                                {{ \Carbon\Carbon::parse($order->order_date)->format('d M Y, h:i A') }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4">
                            <span class="px-3 py-1 rounded-full text-xs font-medium font-inter
                                @if($order->status === 'delivered') bg-green-100 text-green-700
                                @elseif($order->status === 'cancelled') bg-red-100 text-red-600
                                @elseif($order->status === 'shipped') bg-blue-100 text-blue-600
                                @elseif($order->status === 'processing') bg-purple-100 text-purple-600
                                @elseif($order->status === 'confirmed') bg-indigo-100 text-indigo-600
                                @else bg-yellow-100 text-yellow-700
                                @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                            <a href="{{route('order-view', $order->id) }}"
                                class="text-sm text-highlight hover:underline font-inter font-medium">
                                View Details →
                            </a>
                        </div>
                    </div>

                    {{-- Order Items Preview --}}
                    <div class="flex gap-3 flex-wrap mb-4">
                        @foreach ($order->items->take(4) as $item)
                            <div class="flex items-center gap-2 bg-gray-50 rounded-xl px-3 py-2">
                                @if ($item->product && $item->product->first_image_url)
                                    <img src="{{ $item->product->first_image_url }}"
                                        class="w-8 h-8 object-contain rounded">
                                @endif
                                <span class="text-sm font-inter text-gray-700">
                                    {{ $item->product->name ?? 'Product' }}
                                    <span class="text-gray-400">x{{ $item->quantity }}</span>
                                </span>
                            </div>
                        @endforeach
                        @if ($order->items->count() > 4)
                            <div class="flex items-center px-3 py-2 bg-gray-50 rounded-xl">
                                <span class="text-sm text-gray-400 font-inter">+{{ $order->items->count() - 4 }} more</span>
                            </div>
                        @endif
                    </div>

                    {{-- Order Footer --}}
                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        <div class="flex items-center gap-4 text-sm text-gray-500 font-inter">
                            <span>{{ $order->payment_method }}</span>
                            <span>•</span>
                            <span>{{ $order->city }}, {{ $order->area }}</span>
                        </div>
                        <h4 class="text-lg font-semibold font-poppins text-highlight">
                            NPR {{ number_format($order->total_amount, 2) }}
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>