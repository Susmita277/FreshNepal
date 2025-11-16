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
        <li class=" col-span-3 flex justify-end ">
            <div class="w-full px-5 py-2 rounded-full bg-white flex justify-between items-center">
                <input type="text" placeholder="search here ..." class="bg-none border-none outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="#000000"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
            </div>

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
            <a href="{{ route('cart') }}"><x-heroicon-o-shopping-cart class="w-5 h-5 cursor-pointer" /></a>

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
                        <li><a href="#">Profile</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
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
