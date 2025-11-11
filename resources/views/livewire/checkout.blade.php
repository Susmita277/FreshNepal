<div class="relative">

    <!-- You can open the modal using ID.showModal() method -->
    <dialog id="my_modal_3" class="modal">
        <div class="modal-box absolute top-1/5 flex items-center text-center p-5 px-12">
            <div class="">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <div class="flex flex-col" id="otp-form">
                    <h1 class="font-display text-2xl font-bold text-gray-800 dark:text-gray-100">
                        Verify Your Identity
                    </h1>
                    <p class="mt-2 font-display text-sm text-gray-600 dark:text-gray-400">
                        Enter your email or phone number and we'll send you a verification code.
                    </p>
                    <div class="mt-6">
                        <input
                            class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-gray-800 transition-colors duration-200 focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight"
                            placeholder="Enter email or phone number" type="text" />
                    </div>
                    <div class="mt-8">
                        <a class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90"
                            href="#verify-form">
                            <span class="truncate">Send OTP</span>
                        </a>
                    </div>
                </div>
                <div class="flex-col" id="verify-form">
                    <h1 class="font-display text-2xl font-bold text-gray-800 dark:text-gray-100">
                        Enter Verification Code
                    </h1>
                    <p class="mt-2 font-display text-sm text-gray-600 dark:text-gray-400">
                        We've sent a 6-digit code to your device. Please enter it below to continue.
                    </p>
                    <div class="mt-6 flex justify-center">
                        <fieldset class="relative flex gap-2 sm:gap-3">
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="number" value="" />
                        </fieldset>
                    </div>
                    <div class="mt-8">
                        <button
                            class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90">
                            <span class="truncate">Verify</span>
                        </button>
                    </div>
                    <div class="mt-6 font-display text-sm text-gray-600 dark:text-gray-400">
                        <p>
                            Resend code in <span class="font-semibold text-gray-800 dark:text-gray-200">00:59</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </dialog>

    <!--checkout start-->
    <div class="px-24 py-12">
        <div class="flex items-center gap-2 pb-4 ">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-highlight">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
            <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800   ">
                Checkout</h2>
        </div>
        <div class= "grid grid-cols-3 justify-center gap-10 ">

            <div class="col-span-2">


                <div class="mb-8 bg-white px-8 py-5 rounded-md">
                    <h3 class="text-xl font-medium font-poppins text-gray-700">Delivery Address</h3>
                    <div class="grid grid-cols-2 gap-2">
                        <div
                            class="relative flex w-full  flex-col justify-center gap-1 text-on-surface dark:text-on-surface-dark my-4 ">
                            <label for="city"
                                class="w-fit text-gray-500 font-medium text-md font-[var(--font-poppins)] py-2 ">City/District</label>

                            <select id="city" name="city"
                                class="w-full text-gray-400 appearance-none rounded-radius border border-gray-200 rounded-md bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-highlight disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-highlight-dark ">
                                <option class="text-gray-500" selected>Birtamod</option>
                                <option value="mac">Ilam</option>
                                <option value="windows">Phidim</option>
                                <option value="linux">Kathmandu</option>
                                <option value="linux">Biratnagar</option>
                                <option value="linux">Birgunj</option>
                            </select>
                        </div>

                        <div class="my-4 flex-col">
                            <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-500 py-2">Address</h4>
                            <div class="grid gap-2 py-2">
                                <input type="text" placeholder="Muktichowk"
                                    class="w-full text-gray-500 appearance-none rounded-radius border border-gray-200 rounded-md bg-surface-alt px-4 py-2 text-sm focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-highlight disabled:cursor-not-allowed disabled:opacity-75 dark:border-outline-dark dark:bg-surface-dark-alt/50 dark:focus-visible:outline-highlight-dark">

                            </div>
                        </div>
                    </div>

                    <div class="py-3">
                        <h3 class="text-xl font-medium font-poppins text-gray-700">Payment Method</h3>
                        <div class="flex gap-3 ">
                            <div>
                                <div
                                    class="rounded-xl px-8 py-4 mt-4 justify-center flex  flex-col items-center gap-2 border border-gray-200 w-[200px] h-[100px]   hover:border-highlight hover:border-2 transition-all smooth">
                                    <div class="w-[50px] h-[50px]"><img src="money.png"
                                            class="w-full h-full object-contain">

                                    </div>
                                    <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-500 py-2">
                                        Cash
                                        on
                                        Delivery</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mb-8 bg-white p-4 rounded-lg px-12 py-5">
                
                    <h3
                        class="text-md font-normal font-poppins leading-tight tracking-normal pb-3 border-b border-highlight/20 text-gray-800 flex justify-end">
                        <span class="!text-gray-500 text-sm px-2">shipped by</span> Nature's Basket</h3>

                    <div class="divide-y divide-highlight/20 dark:divide-highlight/30">
                        <!-- List Item 1 -->
                        <div class="flex gap-4 bg-transparent  py-5 justify-between ">
                            <div class="flex items-start gap-4 flex-1">
                                <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-lg h-20 w-20 flex-shrink-0"
                                    data-alt="Organic Gala Apples in a bowl"
                                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAF4J8vu1VVJL4rcvA2qRj471uyLnpJMqiVtYbg_n1SW_1RguTMrTveHXQ7hH5Bz04SWuIKbI32mYP167bK_3IqvxjWpSnZlcyh0u1KlhAGomUw-0F00PydQ8V0XK6unWDfggDwW39Sey-1L6gGw2fCXo9nRjIHMmxgHYxIJULeiFCwU9v-ydlMqzwtMKySGCADCU31Wx4Cafm6MtlGFcXETGxdcAoZsxU5TT0Ggr1g5abZkYxLR2bXnkdjDlU7wpRFSfztWHNDGx_L");'>
                                </div>
                                <div class="flex flex-1 flex-col  ">
                                    <p class="text-[#0d1b0d] dark:text-white text-base font-medium leading-normal">
                                        Organic
                                        Gala
                                        Apples
                                    </p>
                                    <p
                                        class="text-highlight/80 dark:text-highlight/90 text-sm font-normal leading-normal">
                                        1
                                        kg
                                    </p>

                                </div>
                            </div>
                            <div class="flex items-start ">
                                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800">
                                    NPR.500
                                </h4>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="">
                <div class="sticky top-28 space-y-6">
                    <div
                        class="border border-highlight/20 dark:border-highlight/30 rounded-xl p-6 bg-white dark:bg-background-dark/80 shadow-sm">
                        <h3 class="text-xl font-bold mb-4 text-[#0d1b0d] dark:text-white">Order Summary</h3>
                        <div class="space-y-3 text-sm text-[#0d1b0d] dark:text-gray-300">
                            <div class="flex justify-between">
                                <span>Subtotal</span>
                                <span>$16.96</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Shipping</span>
                                <div class="flex items-center gap-1">
                                    <span>$8.00</span>
                                    <span class="material-symbols-outlined text-xs cursor-pointer"
                                        title="Calculated per vendor">info</span>
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <span>Order tems</span>
                                <span>4 items</span>
                            </div>
                        </div>
                        <div class="border-t border-highlight/20 dark:border-highlight/30 my-4"></div>
                        <div class="flex justify-between font-bold text-lg text-[#0d1b0d] dark:text-white">
                            <span>Total</span>
                            <span>$26.40</span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <button onclick="my_modal_3.showModal()"
                            class="flex w-full min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 px-4 bg-highlight text-[#0d1b0d] text-base font-bold leading-normal tracking-[0.015em] shadow-lg hover:opacity-90 transition-opacity">
                            <span class="truncate text-white">Place Order</span>
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

</div>
</div>
