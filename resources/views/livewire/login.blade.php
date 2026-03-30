<!-- Login Modal start-->

<div class="flex justify-center items-center py-24">
    <div class="w-[40%] bg-white p-8 rounded-md">
        <div>
            <div class="text-center">
                <h4 class="font-bold text-lg">Agent Login</h4>
                <span class="text-gray-500 text-center">Welcome back! Please enter your details to access your
                    account.</span>
            </div>

            <form wire:submit.prevent="login" class="space-y-4 pt-8">
                <!-- Email -->
                <div>
                    <input type="email" wire:model="email" wire:keydown.enter.prevent placeholder="Enter Your Email"
                        class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none" />
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="relative">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model="password"
                            wire:keydown.enter.prevent placeholder="Enter your password"
                            class="w-full p-2 border border-gray-200 rounded-md pr-10 outline-none focus:border-highlight" />
                        <button type="button" wire:click="togglePassword"
                            class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                            aria-label="{{ $showPassword ? 'Hide password' : 'Show password' }}">
                        </button>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="text-sm font-medium font-poppins bg-highlight py-2 px-5 text-white rounded-md w-full mt-4 cursor-pointer ">
                    Sign In
                </button>

                @if (session()->has('error'))
                    <p class="text-red-500 text-sm mt-2 text-center">{{ session('error') }}</p>
                @endif

                <div class="divider">OR</div>

                <div class="flex items-center text-center justify-center text-gray-500">
                    <span>
                        Don't have an account?
                        <a class="link font-semibold" href="{{ route('user-register') }}">Sign up</a>
                    </span>
                </div>

            </form>
        </div>

    </div>
</div>


<!--login modal end-->
