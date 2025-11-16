<main class="layout-container flex h-full grow flex-col">
    <div class="flex flex-1 justify-center py-12 px-24">
        <div class="layout-content-container flex flex-col w-full">
            <div class="flex flex-col items-center text-center gap-4 mb-10">
                <div class="flex items-center justify-center size-16 rounded-full bg-green-100 dark:bg-green-900/50">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 text-green-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-2">
                    <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800">
                        Thank you for your order!</h2>
                    <p class="text-gray-600 dark:text-gray-400 text-base font-normal leading-normal max-w-lg mx-auto">
                        Your order has been confirmed successfully.
                    </p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12 mt-8">
                <div class="lg:col-span-2">
                    <div class="dark:bg-background-dark/50 rounded-xl border border-gray-200/80 dark:border-gray-800/80">
                        <div class="flex justify-between items-center px-8">
                            <h2 class="text-gray-900 dark:text-white text-[22px] font-medium leading-tight tracking-[-0.015em] px-6 py-5 dark:border-gray-800/80">
                                Your Order
                            </h2>
                        </div>
                        <div class="divide-y divide-gray-200/80 dark:divide-gray-800/80">
                            <!-- Order items will be displayed here -->
                            <div class="mb-8 mx-8 bg-white p-4 rounded-lg px-12 py-5">
                                <h3 class="text-md font-normal font-poppins leading-tight tracking-normal pb-3 border-b border-highlight/20 text-gray-800">
                                    Order Details
                                </h3>
                                <div class="divide-y divide-highlight/20 dark:divide-highlight/30 mt-4">
                                    <div class="flex justify-between py-3">
                                        <span class="text-gray-600">City:</span>
                                        <span class="font-medium text-gray-800">{{ $orderData['city'] ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between py-3">
                                        <span class="text-gray-600">Area:</span>
                                        <span class="font-medium text-gray-800">{{ $orderData['area'] ?? 'Not specified' }}</span>
                                    </div>
                                    <div class="flex justify-between py-3">
                                        <span class="text-gray-600">Order Status:</span>
                                        <span class="font-medium text-green-600">{{ $orderData['status'] ?? 'Pending' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                        <div class="bg-white dark:bg-background-dark/50 rounded-xl shadow-sm p-6 border border-gray-200/80 dark:border-gray-800/80">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Delivery Address</h3>
                            <div class="space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                                <p>{{ Auth::user()->name ?? 'Customer' }}</p>
                                <p>{{ $orderData['area'] ?? 'Your area' }}, {{ $orderData['city'] ?? 'Your city' }}</p>
                                <p class="pt-2 text-sm text-gray-500 dark:text-gray-400/80">
                                    Delivery: Within 2-3 business days
                                </p>
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-background-dark/50 rounded-xl shadow-sm p-6 border border-gray-200/80 dark:border-gray-800/80">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Payment Method</h3>
                            <div class="space-y-1 text-gray-600 dark:text-gray-400 text-sm">
                                <p>Cash on Delivery</p>
                                <p class="font-medium text-gray-700 dark:text-gray-300">Payment Status:</p>
                                <p class="text-green-600">To be paid on delivery</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-background-dark/50 rounded-xl shadow-sm border border-gray-200/80 dark:border-gray-800/80 p-6 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Order Summary</h3>
                        <div class="space-y-3 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Subtotal</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200">
                                    NPR {{ number_format($orderData['subtotal'] ?? 0, 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600 dark:text-gray-400">Delivery Fee</span>
                                <span class="font-medium text-gray-800 dark:text-gray-200">
                                    NPR {{ number_format($orderData['delivery_charge'] ?? 0, 2) }}
                                </span>
                            </div>
                            <div class="border-t border-gray-200/80 dark:border-gray-700/80 my-3"></div>
                            <div class="flex justify-between text-base">
                                <span class="font-bold text-gray-900 dark:text-white">Total</span>
                                <span class="font-bold text-gray-900 dark:text-white">
                                    NPR {{ number_format($orderData['total'] ?? 0, 2) }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-8 space-y-4">
                            <a href="{{ route('products') }}">
                                <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-white gap-2 text-base font-bold leading-normal tracking-wide hover:bg-highlight/90 transition-colors">
                                    Continue Shopping
                                </button>
                            </a>
                            <a href="{{ route('home') }}">
                                <button class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 border border-gray-300 text-gray-700 gap-2 text-base font-bold leading-normal tracking-wide hover:bg-gray-50 transition-colors">
                                    Back to Home
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>