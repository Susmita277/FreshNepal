<div class=" relative h-screen bg-bg flex justify-between  gap-5  px-24 py-12 place-items-center">
    <div class="w-[60%]">

        <div class="flex justify-between mb-10 pr-[20%]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-16 text-green-400 ">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
            </svg>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-10 text-green-400 -rotate-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3.75v16.5M2.25 12h19.5M6.375 17.25a4.875 4.875 0 0 0 4.875-4.875V12m6.375 5.25a4.875 4.875 0 0 1-4.875-4.875V12m-9 8.25h16.5a1.5 1.5 0 0 0 1.5-1.5V5.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v13.5a1.5 1.5 0 0 0 1.5 1.5Zm12.621-9.44c-1.409 1.41-4.242 1.061-4.242 1.061s-.349-2.833 1.06-4.242a2.25 2.25 0 0 1 3.182 3.182ZM10.773 7.63c1.409 1.409 1.06 4.242 1.06 4.242S9 12.22 7.592 10.811a2.25 2.25 0 1 1 3.182-3.182Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-10 text-green-400 rotate-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
            </div>


        </div>
        <h1 class="font-poppins font-medium text-5xl tracking-normal leading-normal">Join Our Marketplace

            <br> Grow Your
            Business Online
        </h1>
        <p class="flex text-sm font-inter tracking-relaxed line-spacing-1 font-medium text-gray-500 py-2 pr-20">Create
            your vendor account today and start selling instantly.
            Manage your products, track sales, and connect directly with your customers.
            It’s quick, secure, and built to help your local business thrive.</p>
        <h4
            class="text-md tracking-relaxed font-medium font-inter text-gray-800 shadow-sm bg-blur-sm px-12 w-fit py-2 my-4 tracking-normal text-green-400">
            Enjoy free shipping upto 1 month!</h4>
    </div>

    <!-- Signup Modal start -->
    <div class="flex justify-center items-center py-24 w-[40%]">
        <div class="bg-white p-5 rounded-md">
            @if (session()->has('success'))
                <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded-md text-center">
                    {{ session('success') }}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-md text-center">
                    {{ session('error') }}
                </div>
            @endif

            <div class="text-center">
                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800">Create Account</h4>
                <span class="text-gray-500 text-sm font-inter">Join us! Enter your details to create an account.</span>
            </div>

            <form wire:submit.prevent="registerVendor" class="space-y-4 mt-8">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <!-- Name -->
                    <div>
                        <input type="text" wire:model.defer="name" placeholder="Enter store  name"
                            class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none focus:border-highlight" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone -->
                    <div>
                        <input type="tel" wire:model.defer="phone" placeholder="Enter your number"
                            class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none focus:border-highlight" />
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="col-span-2">
                        <input type="email" wire:model.defer="email" placeholder="Enter Email"
                            class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none focus:border-highlight" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <div class="relative">
                            <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model.defer="password"
                                placeholder="Enter your password"
                                class="w-full p-2 border border-gray-200 rounded-md pr-10 outline-none focus:border-highlight" />
                            <button type="button" wire:click="togglePassword"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                aria-label="{{ $showPassword ? 'Hide password' : 'Show password' }}">
                                @if ($showPassword)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                @endif
                            </button>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

               
                    <div>
                        <div class="relative">
                            <input type="{{ $showConfirmPassword ? 'text' : 'password' }}"
                                wire:model.defer="password_confirmation" placeholder="Confirm Your Password"
                                class="w-full p-2 border border-gray-200 rounded-md pr-10 outline-none focus:border-highlight" />
                            <button type="button" wire:click="toggleConfirmPassword"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                aria-label="{{ $showConfirmPassword ? 'Hide password' : 'Show password' }}">
                                @if ($showConfirmPassword)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                @endif
                            </button>
                        </div>
                    </div>
                </div>

                <button type="submit" wire:loading.attr="disabled"
                    class="text-sm font-medium font-poppins bg-highlight py-2 px-5 text-white rounded-md w-full mt-4 hover:bg-opacity-90 disabled:bg-gray-400 disabled:cursor-not-allowed transition-colors">
                    <span wire:loading.remove wire:target="registerVendor">Create Account</span>
                    <span wire:loading wire:target="registerVendor">
                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        Creating Account...
                    </span>
                </button>

                <div class="divider">OR</div>

                <div class="flex items-center text-center justify-center text-gray-500">
                    <span>
                        Already have an account?
                    
                        <a href="/vendor/login" class="link font-semibold text-highlight hover:underline">
                            Log in
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <!-- signup modal end -->


</div>
