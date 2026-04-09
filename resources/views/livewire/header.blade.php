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


        <li class="col-span-3 flex justify-end relative" x-data="{ open: @entangle('showSearchDropdown') }">
            <div class="w-full px-5 py-2 rounded-full bg-white flex justify-between items-center border border-gray-200"
                @click.away="open = false; $wire.closeSearchDropdown()">

                <input type="text" wire:model.live.debounce.300ms="searchQuery" placeholder="Search products..."
                    class="bg-transparent border-none outline-none w-full focus:ring-0" autocomplete="off">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#000000"
                    class="w-5 h-5 shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>

            {{-- Search Results Dropdown --}}
            @if ($showSearchDropdown && count($searchResults) > 0)
                <div
                    class="absolute top-full mt-2 w-full bg-white rounded-2xl shadow-xl border border-gray-100 z-50 overflow-hidden">
                    <p class="text-xs text-gray-400 font-inter px-4 pt-3 pb-1 uppercase tracking-widest">Results</p>
                    <ul>
                        @foreach ($searchResults as $result)
                            <li>
                                <a href="{{ route('product-details', $result['slug']) }}" wire:click="resetSearch"
                                    class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors group">

                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-gray-100 shrink-0">
                                        @if ($result['image'])
                                            <img src="{{ $result['image'] }}" alt="{{ $result['name'] }}"
                                                class="w-full h-full object-contain group-hover:scale-105 transition-transform">
                                        @else
                                            <div
                                                class="w-full h-full flex items-center justify-center text-gray-300 text-xs">
                                                N/A</div>
                                        @endif
                                    </div>

                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium font-poppins text-gray-800 truncate">
                                            {{ $result['name'] }}</p>
                                        <p class="text-xs text-gray-400 font-inter">{{ $result['unit_type'] }}</p>
                                    </div>

                                    <span class="text-sm font-semibold text-highlight font-poppins shrink-0">
                                        NPR. {{ number_format($result['price'], 2) }}
                                    </span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="border-t border-gray-100 px-4 py-2">
                        <a href="{{ route('products') }}?search={{ $searchQuery }}" wire:click="resetSearch"
                            class="text-xs text-highlight hover:underline font-inter">
                            See all results for "{{ $searchQuery }}"
                        </a>
                    </div>
                </div>
            @endif

            {{-- No results state --}}
            @if ($showSearchDropdown && count($searchResults) === 0 && strlen($searchQuery) >= 2)
                <div
                    class="absolute top-full mt-2 w-full bg-white rounded-2xl shadow-xl border border-gray-100 z-50 px-4 py-6 text-center">
                    <p class="text-sm text-gray-500 font-inter">No products found for "<span
                            class="font-medium text-gray-700">{{ $searchQuery }}</span>"</p>
                </div>
            @endif
        </li>


        <li class="flex gap-6 items-center col-span-2 justify-end ">
            <a href="{{ route('seller-verify') }}">
                <p
                    class="flex text-sm font-inter tracking-tight font-medium text-gray-700 cursor-pointer hover:text-highlight">
                    Become a seller
                </p>
            </a>
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
                        <li><a href="{{ route('order-history') }}">Order History</a></li>

                        <li>
                            <button type="button" wire:click="logout">Logout</button>

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
