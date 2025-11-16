<div class="flex justify-center items-center py-24">
    <div class="w-[40%] bg-white p-8 rounded-md shadow-md">
        <div class="text-center">
            <h4 class="text-xl font-semibold">Create Account</h4>
            <span class="text-gray-500">Join us! Enter your details to create an account.</span>
        </div>

        <form wire:submit.prevent="register"  class="space-y-4 mt-8">
            <div class="grid grid-cols-2 gap-4">
                <!-- Name -->
                <div>
                    <input type="text" wire:model="name" placeholder="Enter name"
                        class="w-full p-2 border border-gray-300 rounded-md outline-none">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <input type="text" wire:model="phone" placeholder="Enter your number"
                        class="w-full p-2 border border-gray-300 rounded-md outline-none">
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-span-2">
                    <input type="email" wire:model="email" placeholder="Enter Email"
                        class="w-full p-2 border border-gray-300 rounded-md outline-none">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <div class="relative">
                        <input type="{{ $showPassword ? 'text' : 'password' }}" wire:model="password"
                            placeholder="Enter your password"
                            class="w-full p-2 border border-gray-300 rounded-md pr-10 outline-none focus:border-highlight" />
                        <button type="button" 
                                wire:click="togglePassword" 
                                wire:key="password-toggle"
                                onclick="event.stopPropagation()"
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                aria-label="{{ $showPassword ? 'Hide password' : 'Show password' }}">
                            @if ($showPassword)
                                <!-- Eye slash icon (password visible) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            @else
                                <!-- Eye icon (password hidden) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5">
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

                <!-- Confirm Password -->
                <div>
                    <div class="relative">
                        <input type="{{ $showPasswordConf ? 'text' : 'password' }}" wire:model="password_confirmation"
                            placeholder="Confirm your password"
                            class="w-full p-2 border border-gray-300 rounded-md pr-10 outline-none focus:border-highlight" />
                        <button type="button" 
                                wire:click="toggleConfirmPassword"
                                wire:key="confirm-password-toggle" 
                                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                aria-label="{{ $showPasswordConf ? 'Hide password' : 'Show password' }}">
                            @if ($showPasswordConf)
                                <!-- Eye slash icon (password visible) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                            @else
                                <!-- Eye icon (password hidden) -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            @endif
                        </button>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="text-sm font-medium font-poppins bg-highlight py-2 px-5 text-white rounded-md w-full mt-4">
                Sign Up
            </button>

            @if (session()->has('success'))
                <p class="text-green-600 text-center mt-2">{{ session('success') }}</p>
            @endif

            <div class="divider">OR</div>

            <div class="flex justify-center text-gray-500">
                <span>
                    Already have an account?
                    <a class="link font-semibold text-primary" href="{{ route('user-login') }}">Log in</a>
                </span>
            </div>
        </form>
    </div>
</div>