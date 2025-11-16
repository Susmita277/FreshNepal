<nav class="font-poppins lg:block hidden px-12 py-2  ">
    <ul class="flex  justify-between items-center bg-white shadow-sm mt-4 px-4 py-3">
        <a href="index.html">
            <li class="flex gap-0 items-center ">
                <img src="public/logo.png" alt="logo" class=" w-[120px] object-cover object-center">

            </li>
        </a>

        <li class="flex items-center gap-8 ">
            <div class="flex gap-8 items-center transition-all smooth ">
                <h5 class="hover:text-accent">Home</h5>

                <div class=" group  inline-block ">
                    <h5 class="group-hover:text-accent z-50">Women</h5>
                    <!-- <div class="absolute top-full -right-90  w-fit  group-hover:flex gap-12 px-12 py-10  bg-white z-0">
                        <div>
                            <h5 class="text-accent">TopWear</h5>
                            <span>T-shirt</span>
                            <span>Causual-Shirt</span>
                            <span>Formal Shirt</span>
                        </div>
                        <div>
                            <h5 class="text-accent">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                        <div>
                            <h5 class="text-accent">TopWear</h5>
                            <span>T-shirt</span>
                            <span>Causual-Shirt</span>
                            <span>Formal Shirt</span>
                        </div>
                        <div>
                            <h5 class="text-accent">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                        <div>
                            <h5 class="text-accent">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                    </div> -->
                </div>
                <div class=" group ">
                    <h5 class="group-hover:text-accent">Men</h5>
                    <!-- <div
                        class="absolute top-full -right-80  w-fit hidden group-hover:flex  gap-12 px-12 py-10   bg-white">
                        <div>
                            <h5 class="text-accent mb-2">TopWear</h5>
                            <span>T-shirt</span>
                            <span>Causual-Shirt</span>
                            <span>Formal Shirt</span>
                        </div>

                        <div>
                            <h5 class="text-accent mb-2">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                        <div>
                            <h5 class="text-accent mb-2">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                    </div> -->
                </div>
                <div class=" group ">
                    <h5 class="group-hover:text-accent">Kids</h5>
                    <!-- <div
                        class="absolute top-full -right-60  w-fit hidden group-hover:flex  gap-12 px-12 py-10   bg-white">
                        <div>
                            <h5 class="text-accent mb-2">TopWear</h5>
                            <span x-text="$store.user.name"></span>

                            <span>T-shirt</span>
                            <span>Causual-Shirt</span>
                            <span>Formal Shirt</span>
                        </div>
                        <div>
                            <h5 class="text-accent mb-2">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                        <div>
                            <h5 class="text-accent mb-2">Bottomwear</h5>
                            <span>Jeans</span>
                            <span>Formal Trousers</span>
                            <span>Ca Trousers</span>
                        </div>
                    </div> -->
                </div>



                <a href="product.html">
                    <h5 class="hover:text-accent">All</h5>
                </a>

            </div>
            <div class="flex gap-4">

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6" @click.prevent="$store.modal.showSearchModal()">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>

                <label for="my-drawer-3" @click.prevent="$store.modal.showWishlist()" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                    </svg>

                    <span x-show="$store.app.wishlist.length > 0"
                        class="absolute top-1  -right-[1px] w-2 h-2 bg-red-500 rounded-full flex text-white items-center justify-center"></span>
                </label>



                <a href="checkout.html" class="relative">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>

                    <span x-show="$store.app.cart.length > 0"
                        class="absolute top-1  -right-[1px] w-2 h-2 bg-red-500 rounded-full flex text-white items-center justify-center"></span>
                </a>

                <div class="relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <div
                        class="absolute px-5 py-2 bg-white  translate py-4 -translate-x-[110px] w-[150px] group-hover:block hidden top-full">
                        <template x-if="!$store.user.isLoggedIn">
                            <div>
                                <p class="py-1 cursor-pointer" @click.prevent="$store.modal.showLogin()">Sign in</p>
                                <p class="py-1 cursor-pointer" @click.prevent="$store.modal.showSignup()">Sign up</p>
                            </div>
                        </template>

                        <template x-if="$store.user.isLoggedIn">
                            <div>
                                <a href="user-dashboard.html">
                                    <p class="py-1 cursor-pointer">Dashboard</p>
                                </a>
                                <p class="py-1 cursor-pointer">Profile</p>
                                <a href="order-history.html">
                                    <p class="py-1 cursor-pointer">Order History</p>
                                </a>
                                <p class="py-1 cursor-pointer">Sign Out</p>
                            </div>

                        </template>

                    </div>

                </div>


            </div>

        </li>
    </ul>
</nav>

<!--header for small screen-->
<nav class="lg:hidden bg-white py-2 px-5 w-full flex justify-between items-center shadow-sm">
    <div class="flex w-full  justify-between">
        <a href="index.html">
            <div class="flex gap-0 items-center ">
                <img src="public/logo.png" alt="logo" class=" lg:w-[120px] w-[80px] object-cover object-center">
            </div>
        </a>
    </div>
    <div>
        <template x-if="$store.user.isLoggedIn">
            <a href="/user-profile.html">
                <div class="grid grid-cols-2  items-center ">
                    <div>
                        <div class="rounded-full bg-accent text-white w-8 h-8 flex justify-center items-center">
                            <h5 x-text="$store.user.users.name ? $store.user.users.name.charAt(0).toUpperCase() : ''">
                            </h5>
                        </div>
                    </div>
                    <div>
                        <h5 class="leading-[0.5]">Account</h5>
                        <span class="text-accent underline" x-text="$store.user.users.name"></span>
                    </div>
                </div>
            </a>
        </template>
        <template x-if="!$store.user.isLoggedIn">
            <div class="flex gap-2 items-center cursor-pointer">
                <div class="rounded-full p-2 flex items-center justify-center bg-gray-200 "
                    @click.prevent="$store.modal.showLogin()">
                    <a href="">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#000000" class="size-4 ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg></a>
                </div>
                <div>
                    <h5 class="leading-[0.5]">Account</h5>
                    <div class="flex gap-1 ">
                        <a href="#" @click.prevent="$store.modal.showLogin()"><span
                                class="text-accent cursor-pointer">signin/</span></a>
                        <a href="#" @click.prevent="$store.modal.showSignup()">
                            <span class="text-accent">create</span></a>
                    </div>
                </div>
            </div>
        </template>
    </div>


</nav>
<!--header for small screen end-->

<!--search modal-->
<dialog id="search_modal" class="modal" x-data="search">
    <div class="modal-box overflow-hidden p-10 relative">
        <div class="p-3 flex gap-2 border border-accent rounded-md ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" placeholder="What are You Looking For?" class="outline-none border-none w-full"
                x-model="searchQuery" @keyup.debounce.400="searchRequest()"
                @keyup.enter.window="window.location.href='/product.html?search=' + encodeURIComponent(searchQuery)">

        </div>

        <template x-if="preMessage">
            <div class="my-4 ">
                <p class="pt-8 text-center">Search here and get your desired products</p>
            </div>
        </template>
        <template x-if="noResults">
            <div class="pt-8 w-full ">
                <div class="flex items-center justify-center">
                    <div class="w-20 h-20 overflow-hidden flex justify-center ">
                        <img src="public/no-results.png" class="w-full h-full object-contain">
                    </div>
                </div>
                <p class=" text-center">No <strong>results</strong> found. Try another <strong>search!</strong></p>
            </div>
        </template>
        <template x-if="results.length>0">
            <div class=" my-4 h-[400px] overflow-y-auto  mt-6 scrollbar-hide smooth transition-all   ">
                <template x-for="item in results" :key="item.id">
                    <div class="flex gap-4 my-4"
                        @click.prevent="$store.modal.hideSearchModal();$store.app.quickView(item.id)">
                        <div class="w-[100px] h-[100px] bg-neutral">
                            <img :src="item.images[0]" class="object-contain object-center w-full h-full"
                                onerror="this.src = window.location.origin + '/public/image-placeholder.webp'">
                        </div>
                        <div>
                            <p class="text-gray-500" x-text="item.category.name"></p>
                            <h5 x-text="item.name"></h5>

                            <h4 class="py-2" x-text="item.price"></h4>
                        </div>
                    </div>
                </template>
            </div>
            <span class="py-2">Result found <em x-text="results.length"></em></span>
        </template>


        <button @click.prevent="$store.modal.hideSearchModal()" class="absolute top-2 right-2 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c70000"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

        </button>
    </div>

</dialog>



<!--favourite modal start-->
<div class="drawer drawer-end ">
    <input type="checkbox" class="drawer-toggle" x-bind:checked="$store.modal.wishlistDrawerOpen"
        @change="$store.modal.wishlistDrawerOpen = $event.target.checked" />
    <div class="drawer-side z-100">
        <label for="" aria-label="close sidebar" class="drawer-overlay" @click="$store.modal.hideWishlist()"></label>
        <div class="bg-white lg:w-[30%] w-full p-3 h-screen z-60">
            <div class="flex justify-between items-center">
                <div class="flex gap-2 items-center">
                    <label class="cursor-pointer" @click="$store.modal.hideWishlist()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>

                    </label>
                    <h5>My Wishlist (<data class="text-primary" x-text="$store.app.wishlist.length"></data>)</h5>
                </div>
                <div class="flex gap-2 items-center" @click="$store.app.clearWishlist()"
                    x-show="$store.app.wishlist.length > 0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#c70000" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                    <h5>clear</h5>
                </div>
            </div>

            <div x-show="$store.app.wishlist.length === 0" class="flex justify-center items-center pt-24">
                <div>
                    <div class="w-[200px] h-[200px]"><img
                            src="https://shop.nmc.coop.np/images/illustrations/emptywishlist.webp"
                            class="w-full h-full object-cover"></div>
                    <p class="text-center my-2">Your <strong>Wishlist</strong> is empty</p>
                    <a href="product.html" class="flex justify-center">
                        <div
                            class="flex justify-center gap-2  py-2 px-4 w-fit my-4 rounded-full transition-all capitalize text-[14px] font-semibold border border-primary text-primary font-[var(--font-poppins) ]">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" color="currentColor">
                                <path
                                    d="M12 22C11.1818 22 10.4002 21.6698 8.83693 21.0095C4.94564 19.3657 3 18.5438 3 17.1613C3 16.7742 3 10.0645 3 7M12 22C12.8182 22 13.5998 21.6698 15.1631 21.0095C19.0544 19.3657 21 18.5438 21 17.1613V7M12 22L12 11.3548"
                                    stroke="currentColor"></path>
                                <path
                                    d="M8.32592 9.69138L5.40472 8.27785C3.80157 7.5021 3 7.11423 3 6.5C3 5.88577 3.80157 5.4979 5.40472 4.72215L8.32592 3.30862C10.1288 2.43621 11.0303 2 12 2C12.9697 2 13.8712 2.4362 15.6741 3.30862L18.5953 4.72215C20.1984 5.4979 21 5.88577 21 6.5C21 7.11423 20.1984 7.5021 18.5953 8.27785L15.6741 9.69138C13.8712 10.5638 12.9697 11 12 11C11.0303 11 10.1288 10.5638 8.32592 9.69138Z"
                                    stroke="currentColor"></path>
                                <path d="M6 12L8 13" stroke="currentColor"></path>
                                <path d="M17 4L7 9" stroke="currentColor"></path>
                            </svg>
                            <button class="outline-none">Add Products</button>
                        </div>
                    </a>
                </div>
            </div>

            <!-- product wishlist-->
            <div class="py-4 flex-col overflow-y-auto scrollbar-hide max-h-[calc(100vh-50px)]"
                x-show="$store.app.wishlist.length > 0">
                <template x-for="(item,index) in $store.app.wishlist" :key="item.id">
                    <div class="grid grid-cols-6 gap-4 py-4 border-b border-gray-100">
                        <div class="col-span-4  ">
                            <div class="grid grid-cols-4 ">
                                <div class="  w-[100px] h-[100px] bg-neutral col-span-2">
                                    <img :src="item.images?.[0] ? $store.config.storage_url + item.images[0] :'/placeholder.png'"
                                        class="w-full h-full object-contain object-center">
                                </div>
                                <div class="col-span-2">
                                    <div>
                                        <span class="font-semibold" x-text="item.name"></span>
                                    </div>

                                    <button class=" mt-4 mbtn flex gap-1  justify-center" @click=" if ($store.app.isInCart(item)) {
                                    } else {
                                   $store.app.addToCart(item);}">


                                        <svg x-show="!$store.app.isInCart(item)" class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993   1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125   1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1   5.513 7.5h12.974c.576 0 1.059.435   1.119 1.007ZM8.625 10.5a.375.375 0 1   1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375   0 1 1-.75 0 .375.375 0 0 1 .75 0Z">
                                            </path>
                                        </svg>

                                        <!-- Checkmark Icon (Shows when IN cart) -->
                                        <svg x-show="$store.app.isInCart(item)" class="w-5 h-5"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M8.603 3.799A4.49 4.49 0 0 1 12 2.25c1.357  0 2.573.6 3.397 1.549a4.49 4.49 0 0 1 3.498  1.307 4.491 4.491 0 0 1 1.307 3.497A4.49  4.49 0 0 1 21.75 12a4.49 4.49 0 0 1-1.549  3.397 4.491 4.491 0 0 1-1.307 3.497 4.491  4.491 0 0 1-3.497 1.307A4.49 4.49 0 0 1  12 21.75a4.49 4.49 0 0 1-3.397-1.549  4.49 4.49 0 0 1-3.498-1.306 4.491  4.491 0 0 1-1.307-3.498A4.49 4.49 0   0 1 2.25 12c0-1.357.6-2.573 1.549-3.397a4.49   4.49 0 0 1 1.307-3.497 4.49 4.49 0 0 1    3.497-1.307Zm7.007 6.387a.75.75 0 1   0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                clip-rule="evenodd">
                                            </path>
                                        </svg>

                                        <!-- Text (Changes based on cart state) -->
                                        <span x-text="$store.app.isInCart(item) ? 'In Cart' : 'Add to Cart'"></span>
                                    </button>

                                </div>
                            </div>
                        </div>

                        <div class="grid  justify-end col-span-2 ">
                            <div @click="$store.app.removeWishlist(index)" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="#c70000" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </div>
                            <h5 class="self-end text-primary" x-text="'NPR  ' + item.price">

                            </h5>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</div>
<!--favourite modal end-->



<!--product detail modal-->
<!-- Open the modal using ID.showModal() method -->
<dialog id="product_modal" class="modal">
    <div class="modal-box lg:h-[600px] lg:min-w-[1100px] !m-0 !p-0 overflow-hidden relative w-full  h-auto ">
        <template x-if="$store.app.productInformationLoading">
            <div class="flex justify-center items-center h-full w-full">
                <span class="loading loading-spinner loading-xl"></span>
            </div>
        </template>
        <template x-if="!$store.app.productInformationLoading">
            <div>
                <template x-if="$store.app.productInfoLoaded">
                    <div class="grid lg:grid-cols-3 grid-cols-1  gap-x-4 max-w-none p-0 ">
                        <div class=" lg:col-span-2 w-full relative h-full flex items-center justify-center">
                            <div class=" w-full  bg-neutral  flex items-center justify-center lg:h-[600px] h-[300px] ">
                                <div class="  h-full ">
                                    <img :src="$store.config.storage_url + $store.app.productInfo.images" alt="for you"
                                        class="w-full h-full  object-contain object-center"
                                        onerror="this.src = window.location.origin + '/public/image-placeholder.webp'">
                                </div>
                            </div>

                            <div class="absolute lg:top-20 bottom-20 right-8 top-5 ">
                                <template x-for="(image, index) in $store.app.productInfo.images" :key="index">
                                    <div class="lg:w-[100px] lg:h-[100px] w-[80px] h-[80px] my-2 flex items-center justify-center border border-gray-300 hover:border-accent"
                                        @click="selectedIndex = index">
                                        <img :src="$store.config.storage_url + image" alt="loading"
                                            class="object-contain w-full h-full object-center"
                                            onerror="this.src = window.location.origin + '/public/image-placeholder.webp'">
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div class="p-8 h-[350px] overflow-y-auto scrollbar-hide lg:h-auto  ">
                            <h4 x-text="$store.app.productInfo.name"></h4>
                            <div class="flex gap-4 items-center py-2">
                                <p x-text=" 'NPR '  + $store.app.productInfo.price"></p>
                                <span class="line-through text-gray-600" x-text=" $store.app.productInfo.mrp"></span>

                            </div>
                            <div class="pb-8 pt-2">
                                <div class="flex gap-10 items-center py-2">
                                    <h5>Color</h5>
                                    <div class="flex gap-2">
                                        <template x-for="color in $store.app.productInfo.colors"
                                            :key="color.color_name">
                                            <div @click="$store.app.productInfo.selectedColor = color.color_name"
                                                :class="{'border border-accent': $store.app.productInfo.selectedColor === color.color_name}"
                                                class="px-3 rounded-sm py-1 flex justify-center items-center border border-gray-200 cursor-pointer capitalize">
                                                <span x-text="color.color_name"></span>
                                            </div>
                                        </template>


                                    </div>

                                </div>


                                <div class="flex gap-12 items-center py-2">
                                    <h5>Size</h5>
                                    <div class="flex gap-2">
                                        <template x-for="size in $store.app.productInfo.sizes" :key="size.size">
                                            <div @click="$store.app.productInfo.selectedSize = size.size"
                                                :class="{'border border-accent': $store.app.productInfo.selectedSize === size.size}"
                                                class="w-8 h-6 p-1 rounded-sm flex justify-center items-center border border-gray-200 cursor-pointer">
                                                <span x-text="size.size"></span>
                                            </div>
                                        </template>

                                    </div>

                                </div>

                            </div>
                            <div class="py-8  flex gap-4 items-center border-t border-b border-gray-100">
                                <div :disabled="!$store.app.selectedVariant"
                                    x-on:click="$store.app.addToCart($store.app.productInfo, $store.app.selectedVariant); $store.modal.hideProductDetail()"
                                    class="disabled:opacity-50 disabled:cursor-not-allowed flex gap-2 mbtn items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                    </svg>
                                    Add to Cart
                                </div>
                                <div class="favourite-btn flex items-center gap-2"
                                    @click="$store.app.addToWishlist(product)">
                                    Save
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                    </svg>

                                </div>

                            </div>
                            <div class="mt-6">
                                <div>
                                    <h5>Product Description</h5>
                                    <span x-text="$store.app.productInfo.description"></span>
                                </div>
                                <div class="py-4">
                                    <h5>Share</h5>
                                    <div class="flex gap-2 items-center">
                                        <img src="public/facebook.svg" alt="facebook" class="w-5 h-5">
                                        <img src="public/instagram.svg" alt="instagram" class="w-5 h-5">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </template>
            </div>
        </template>
        <button @click.prevent="$store.modal.hideProductDetail()" class="absolute top-2 right-2 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#c70000"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>

        </button>

    </div>
</dialog>
<!--product detail modal end-->




<!-- Signup Modal start -->
<dialog id="signup_modal" class="modal" x-ref="Signup">
    <div class="modal-box" x-data>
        <form method="dialog">
            <button class=" outline-none  absolute right-5 top-5">✕</button>
        </form>

        <div class="text-center">
            <h4>Create Account</h4>
            <span class="text-gray-500">Join us! Enter your details to create an account.</span>
        </div>

        <form class="space-y-4 mt-8" @submit.prevent="$store.registerForm.Formsubmit()">
            <div class=" grid grid-cols-2 gap-4">
                <!-- Email -->
                <div><input type="name" placeholder="Enter name"
                        class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                        x-model="$store.registerForm.form.name" />
                    <template x-if="$store.registerForm.errors.name">
                        <span class="text-red-500 text-[10px]" x-text="$store.registerForm.errors.name"></span>
                    </template>
                </div>
                <div>
                    <input type="phone" placeholder="Enter your number"
                        class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                        x-model="$store.registerForm.form.phone" />
                    <template x-if="$store.registerForm.errors.phone">
                        <span class="text-red-500 text-sm" x-text="$store.registerForm.errors.phone"></span>
                    </template>
                </div>
                <div class="col-span-2">
                    <input type="email" placeholder="Enter Email"
                        class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                        x-model="$store.registerForm.form.email" />
                    <template x-if="$store.registerForm.errors.email">
                        <span class="text-red-500 text-sm" x-text="$store.registerForm.errors.email"></span>
                    </template>
                </div>
                <!-- email end-->
                <!-- Password -->
                <div>
                    <div x-data="{ showPassword: false }" class="relative">
                        <input x-bind:type="showPassword ? 'text' : 'password'" id="passwordInput1"
                            class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                            x-model="$store.registerForm.form.password" autocomplete="current-password"
                            placeholder="Enter your password" />
                        <button type="button" x-on:click="showPassword = !showPassword"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface dark:text-on-surface-dark"
                            aria-label="Show password">
                            <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                    <template x-if="$store.registerForm.errors.password">
                        <span class="text-red-500 text-sm" x-text="$store.registerForm.errors.password"></span>
                    </template>
                </div>

                <!-- confirm password -->
                <div>
                    <div x-data="{ showConfirmPassword: false }" class="relative">
                        <input x-bind:type="showConfirmPassword ? 'text' : 'password'" id="passwordInput2"
                            class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                            x-model="$store.registerForm.form.password_confirmation" autocomplete="current-password"
                            placeholder="Confirm Your Password" />
                        <button type="button" x-on:click="showConfirmPassword = !showConfirmPassword"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface dark:text-on-surface-dark"
                            aria-label="Show password">
                            <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"
                                class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Confirm Password  end-->

            <button @click="$store.registerForm.Formsubmit()" class="mbtn  w-full mt-4">Signup</button>

            <div class="divider">OR</div>



            <div class="flex items-center text-center justify-center text-gray-500">
                <span>
                    Already have an account?
                    <a onclick="signup_modal.close(); login_modal.showModal()" class="link font-semibold">Log in</a>
                </span>
            </div>
        </form>
    </div>



</dialog>
<!--signup modal end-->

<div x-data="checkout">
    <dialog id="otp_modal" class="modal">
        <div class="modal-box relative">
            <div class="flex justify-center gap-2 items-center">
                <div class="flex gap-0 items-center p-3 shadow-sm rounded-md">
                    <li class="flex gap-0 items-center ">
                        <img src="public/logo.png" alt="logo" class=" w-[120px] object-cover object-center">

                    </li>
                </div>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#0e4c5e" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                    </svg>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#0e4c5e" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                    </svg>

                </div>
                <div class="flex gap-0 items-center p-5 shadow-sm rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#0e4c5e" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                    </svg>

                </div>
            </div>
            <div class="py-4 text-center">
                <h4 class="text-primary">Verify your Email</h4>
                <p>Please Enter the code sent to</p>
                <span class="text-red-500" x-text="$store.user.users.email"></span>

            </div>
            <template x-if="!otpSent">
                <div class="mt-8">
                    <button class="mbtn w-full" @click="sendOtp()">Request Otp</button>
                </div>
            </template>


            <template x-if="otpSent">
                <form class="mt-8 md:px-5 space-y-8" @submit.prevent="verifyOtp()">
                    <div class="grid grid-cols-6 gap-2">
                        <template x-for="(code, index) in codes" :key="index">
                            <input type="text" maxlength="1" inputmode="numeric" pattern="[0-9]*"
                                class="outline-none border-b-2 border-gray-300 focus:border-primary transition text-xl font-bold pb-2 text-center"
                                x-model="codes[index]"
                                @input="codes[index] = $event.target.value.replace(/[^0-9]/g, ''); focusNext($event, index)" />
                        </template>


                    </div>

                    <div class="space-y-5" x-init="startCountdown()">
                        <button class="mbtn w-full btn-lg">Verify</button>

                        <!-- Resend Code -->
                        <template x-if="countdown === 0">
                            <p class="link text-primary flex justify-center" @click="sendOtp(); startCountdown();">
                                Resend Code
                            </p>
                        </template>
                        <template x-if="countdown > 0">
                            <div class="flex justify-center">
                                <p><strong class="text-primary font-semibold">Didn’t receive the OTP?</strong> Please
                                    resend after
                                    <strong class="font-bold text-xl">
                                        <strong x-text="countdown"></strong>s
                                    </strong>
                                </p>
                            </div>
                        </template>


                    </div>
                </form>
            </template>
            <div class="absolute top-2 right-2" @click.prevent="$store.modal.hideOtpModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="#c70000" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
        </div>
    </dialog>
</div>


<!--user menu -->
<div x-data="{ userMenuDrawerOpen: false }" class="drawer">
    <input id="user-drawer" type="checkbox" class="drawer-toggle" x-model="userMenuDrawerOpen" />
    <div class="drawer-content">
        <!-- Page content here -->

    </div>
    <div class="drawer-side">
        <label for="user-drawer" class="drawer-overlay" @click="userMenuDrawerOpen = false"></label>
        <ul class="menu bg-base-200 text-base-content min-h-full w-80 p-4">
            <li class="py-2">
                <div class="flex gap-2  items-center border-b border-gray-100 ">
                    <div>
                        <div class="rounded-full bg-accent text-white w-8 h-8 flex justify-center items-center">
                            <h5 x-text="$store.user.users.name ? $store.user.users.name.charAt(0).toUpperCase() : ''">
                            </h5>
                        </div>
                    </div>
                    <div>
                        <h5 class="leading-[0.5]">Account</h5>
                        <span class="text-accent underline" x-text="$store.user.users.name"></span>
                    </div>
                </div>
            </li>
            <li class="py-2">
                <a href="user-dashboard.html">
                    <div class="flex gap-2 rounded-md  items-center">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#0e4c5e" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9">
                            </path>
                        </svg>
                        <h4>Dashboard</h4>
                    </div>
                </a>
            </li>
            <li class="py-2">
                <a href="order-history.html">
                    <div class="flex gap-2  rounded-md   items-center ">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" color="#0e4c5e">
                            <path
                                d="M4 18.6458V8.05426C4 5.20025 4 3.77325 4.87868 2.88663C5.75736 2 7.17157 2 10 2H14C16.8284 2 18.2426 2 19.1213 2.88663C20 3.77325 20 5.20025 20 8.05426V18.6458C20 20.1575 20 20.9133 19.538 21.2108C18.7831 21.6971 17.6161 20.6774 17.0291 20.3073C16.5441 20.0014 16.3017 19.8485 16.0325 19.8397C15.7417 19.8301 15.4949 19.9768 14.9709 20.3073L13.06 21.5124C12.5445 21.8374 12.2868 22 12 22C11.7132 22 11.4555 21.8374 10.94 21.5124L9.02913 20.3073C8.54415 20.0014 8.30166 19.8485 8.03253 19.8397C7.74172 19.8301 7.49493 19.9768 6.97087 20.3073C6.38395 20.6774 5.21687 21.6971 4.46195 21.2108C4 20.9133 4 20.1575 4 18.6458Z"
                                stroke="currentColor"></path>
                            <path d="M11 11H8" stroke="currentColor"></path>
                            <path d="M14 7L8 7" stroke="currentColor"></path>
                        </svg>
                        <h4>Order History</h4>
                    </div>
                </a>
            </li>
            <li class="py-2">
                <a href="user-profile.html">
                    <div class="flex gap-2  rounded-md   items-center ">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="#0e4c5e" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z">
                            </path>
                        </svg>
                        <h4>Account Preference</h4>
                    </div>
                </a>
            </li>
            <li class="py-2">
                <div class=" flex gap-2 items-center cancel w-[200px] justify-center items-center  "
                    @click="$store.user.logout()">
                    <button class="outline-none capitalize" type="button">
                        sign out
                    </button>

                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15">
                        </path>
                    </svg>
                </div>
            </li>
        </ul>
    </div>
</div>