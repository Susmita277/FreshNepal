<div class="px-24 bg-bg py-2 sticky inset-0 top-0 z-60 ">
    <ul class=" items-center grid grid-cols-6 gap-10 justify-center">
        <a href={{ route('home') }}>
            <li class="flex gap-1 items-center cursor-pointer">
                <div class="w-5 h-5 ">
                    <img src="vegetables.png" class="object-cover w-full h-full">
                </div>
                <h5 class="text-sm font-poppins tracking-normal font-medium">freshNepal</h5>
            </li>
        </a>

        <li class="col-span-3 flex justify-end relative">
            <!-- Search Input - Standalone (not inside any form) -->
            <div class="w-full px-5 py-2 rounded-full bg-white flex justify-between items-center border border-gray-200">
                <input type="text" wire:model.live="searchQuery" wire:click.outside="closeSearchDropdown"
                    placeholder="Search products..." class="bg-transparent border-none outline-none w-full focus:ring-0"
                    x-data @keydown.enter.prevent>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#000000"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>

            <!-- Search Dropdown -->
            @if ($showSearchDropdown)
                <div
                    class="absolute top-full left-0 right-0 mt-2 bg-white rounded-xl shadow-lg border border-gray-200 z-50 max-h-80 overflow-hidden">
                    <!-- Search Header -->
                    <div class="border-b border-gray-100 px-4 py-2 bg-gray-50">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-700">Search Results</span>
                            <button type="button" wire:click="resetSearch" class="text-gray-400 hover:text-gray-600">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Search Results -->
                    <div class="max-h-64 overflow-y-auto">
                        @if (empty($searchResults))
                            <!-- No Results -->
                            <div class="p-6 text-center">
                                <svg class="mx-auto h-8 w-8 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p class="text-sm text-gray-500">No products found</p>
                                <p class="text-xs text-gray-400 mt-1">Try different keywords</p>
                            </div>
                        @else
                            <!-- Product List -->
                            <div class="divide-y divide-gray-100">
                                @foreach ($searchResults as $product)
                                    <button type="button" wire:click="viewProduct({{ $product['id'] }})"
                                        class="w-full text-left p-3 hover:bg-highlight/5 cursor-pointer transition-colors border-b border-gray-100 last:border-b-0">
                                        <div class="flex items-center space-x-3">
                                            <div class="flex-shrink-0">
                                                <img class="h-10 w-10 rounded-lg object-cover"
                                                    src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-medium text-gray-900 truncate">
                                                    {{ $product['name'] }}
                                                </p>
                                                <p class="text-xs text-gray-500 mt-1">
                                                    NPR {{ number_format($product['price'], 2) }} •
                                                    {{ $product['unit_type'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </li>

        
               




        <li class="flex gap-6 items-center col-span-2 justify-end ">
            <a href="{{ route('seller-verify') }}">
                <p
                    class="flex text-sm font-inter tracking-tight font-medium text-gray-700 cursor-pointer hover:text-highlight">
                    Become a seller
            </a>
            </p>
            <a href="{{ route('products') }}">
                <p
                    class="flex text-sm font-inter tracking-tight font-medium text-gray-700 cursor-pointer hover:text-highlight">
                    All products
                </p>
            </a>


            <a href="{{ route('cart') }}"
                class="relative flex items-center gap-1 hover:text-highlight transition-colors">
                <x-heroicon-o-shopping-cart class="w-5 h-5" />
                @if ($cartCount > 0)
                    <span
                        class="absolute -top-2 -left-2 bg-highlight text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        {{ $cartCount }}
                    </span>
                @endif

            </a>

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="">
                    @auth
                        <div
                            class="bg-highlight w-8 h-8 flex justify-center items-center rounded-full cursor-pointer text-white font-semibold">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                    @else
                        <div class="bg-highlight w-8 h-8 flex justify-center items-center rounded-full cursor-pointer">
                            <x-heroicon-o-user-circle class="w-5 h-5 text-white" />
                        </div>
                    @endauth
                </div>

                <ul tabindex="-1" class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                    @auth
                        <li>

                            <button type="submit" wire:click="logout">Logout</button>

                        </li>
                    @else
                        <li><a href="{{ route('user-login') }}">Sign in</a></li>
                        <li><a href="{{ route('user-register') }}">Sign up</a></li>
                    @endauth
                </ul>
            </div>


        </li>
    </ul>

</div>


<!-- Add this script to prevent form submission -->
        <script>
            document.addEventListener('livewire:init', () => {
                // Prevent any form submission when typing in search
                document.addEventListener('keydown', function(e) {
                    if (e.target.tagName === 'INPUT' && e.target.getAttribute('wire:model') === 'searchQuery') {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                            e.stopPropagation();
                            return false;
                        }
                    }
                });
            });
        </script>