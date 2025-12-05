{{-- <div class="relative h-screen bg-bg grid grid-cols-3 gap-10 px-24 py-12 place-items-center">
    <div class="col-span-2">
        <div class="flex justify-between mb-10 pr-[20%]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-16 text-highlight ">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
            </svg>
            <div class="flex gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-10 text-highlight -rotate-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 3.75v16.5M2.25 12h19.5M6.375 17.25a4.875 4.875 0 0 0 4.875-4.875V12m6.375 5.25a4.875 4.875 0 0 1-4.875-4.875V12m-9 8.25h16.5a1.5 1.5 0 0 0 1.5-1.5V5.25a1.5 1.5 0 0 0-1.5-1.5H3.75a1.5 1.5 0 0 0-1.5 1.5v13.5a1.5 1.5 0 0 0 1.5 1.5Zm12.621-9.44c-1.409 1.41-4.242 1.061-4.242 1.061s-.349-2.833 1.06-4.242a2.25 2.25 0 0 1 3.182 3.182ZM10.773 7.63c1.409 1.409 1.06 4.242 1.06 4.242S9 12.22 7.592 10.811a2.25 2.25 0 1 1 3.182-3.182Z" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-10 text-highlight rotate-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 11.25v8.25a1.5 1.5 0 0 1-1.5 1.5H5.25a1.5 1.5 0 0 1-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 1 0 9.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1 1 14.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                </svg>
            </div>
        </div>
        <h1 class="font-poppins font-medium text-5xl tracking-normal leading-normal">Join Our Marketplace
            <br> Grow Your Business Online
        </h1>
        <p class="flex text-sm font-inter tracking-relaxed line-spacing-1 font-medium text-gray-500 py-2 pr-20">
            Create your vendor account today and start selling instantly.
            Manage your products, track sales, and connect directly with your customers.
            It's quick, secure, and built to help your local business thrive.
        </p>
        <h4
            class="text-md tracking-relaxed font-medium font-inter text-gray-800 shadow-sm bg-blur-sm px-12 w-fit py-2 my-4 tracking-normal text-green-400">
            Enjoy free shipping upto 1 month!
        </h4>
    </div>

    <!-- Success/Error Messages -->
    @if (session()->has('success'))
        <div
            class="fixed top-14 right-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded shadow-lg z-50">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="fixed top-14 right-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded shadow-lg z-50">
            {{ session('error') }}
        </div>
    @endif

    <div class="h-fit p-8 bg-white rounded-md shadow-lg">

        @if (!$otpSent)
            <div class="flex flex-col">
                <h1 class="font-display text-2xl font-bold text-gray-800 text-center">
                    Verify Your Identity
                </h1>
                <p class="mt-2 font-display text-sm text-gray-600 text-center">
                    Enter your email and we'll send you a verification code.
                </p>

                <!-- User exists error message -->
                @if ($errorMessage && str_contains($errorMessage, 'already exists'))
                    <div class="mt-4 p-3 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded-md text-center">
                        {{ $errorMessage }}
                        <div class="mt-2">

                        
                            <a href="/vendor/login" class="text-highlight font-semibold hover:underline">
                                Click here to login
                            </a>

                        </div>
                    </div>
                @elseif($errorMessage)
                    <div class="mt-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded-md text-center">
                        {{ $errorMessage }}
                    </div>
                @endif

                <div class="mt-6">
                    <input
                        class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-gray-800 transition-colors duration-200 focus:border-highlight focus:outline-0 focus:ring-0"
                        placeholder="Enter email" type="email" wire:model.defer="email" wire:loading.attr="disabled" />
                    @error('email')
                        <p class="text-red-500 text-sm font-inter mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-8">
                    <button
                        class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90 disabled:bg-gray-400 disabled:cursor-not-allowed"
                        wire:click="sendOtp" wire:loading.attr="disabled" wire:target="sendOtp">
                        <span wire:loading.remove wire:target="sendOtp">Send OTP</span>
                        <span wire:loading wire:target="sendOtp">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Sending...
                        </span>
                    </button>
                </div>
            </div>
        @else
            <!-- Verify OTP Form -->
            <div class="flex-col">
                <h1 class="font-display text-2xl font-bold text-gray-800 text-center">
                    Enter Verification Code
                </h1>
                <p class="mt-2 font-display text-sm text-gray-600 text-center">
                    We've sent a 6-digit code to your email. Please enter it below to continue.
                </p>

                <div class="mt-6 flex justify-center">
                    <div class="relative flex gap-2 sm:gap-3">
                        @foreach (range(0, 5) as $index)
                            <input
                                class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                maxlength="1" type="text" pattern="[0-9]*" inputmode="numeric"
                                wire:model.defer="otp.{{ $index }}" wire:key="otp-{{ $index }}"
                                id="otp-{{ $index }}" wire:loading.attr="disabled" 
                                x-on:input="if($event.target.value.length === 1 && {{ $index }} < 5) { 
                        document.getElementById('otp-{{ $index + 1 }}').focus(); 
                    } else if($event.target.value.length === 1 && {{ $index }} === 5) {
                        // Auto verify when last digit is entered
                        setTimeout(() => { 
                            @this.dispatch('auto-verify'); 
                        }, 100);
                    }"
                                x-on:keydown="if($event.key === 'Backspace' && $event.target.value === '' && {{ $index }} > 0) { 
                        document.getElementById('otp-{{ $index - 1 }}').focus(); 
                    }" />
                        @endforeach
                    </div>
                </div>

                @error('otp')
                    <p class="text-red-500 text-sm font-inter text-center mt-2">{{ $message }}</p>
                @enderror

                <div class="mt-8">
                    <button
                        class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90 disabled:bg-gray-400 disabled:cursor-not-allowed"
                        wire:click="verifyOtp" wire:loading.attr="disabled" wire:target="verifyOtp">
                        <span wire:loading.remove wire:target="verifyOtp">Verify</span>
                        <span wire:loading wire:target="verifyOtp">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            Verifying...
                        </span>
                    </button>
                </div>

                <div class="mt-6 text-sm text-gray-600 text-center">
                    @if ($timer > 0)
                        <p>Resend code in <span class="font-semibold text-gray-800">{{ $timer }} seconds</span>
                        </p>
                    @else
                        <button wire:click="resendOtp" class="text-highlight font-semibold hover:underline">
                            Resend Code
                        </button>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>

@script
    <script>
        Livewire.on('start-timer', () => {
            let interval = setInterval(() => {
                $wire.decrementTimer();
                if ($wire.timer <= 0) {
                    clearInterval(interval);
                }
            }, 1000);
        });

        // Handle auto-verify when last digit is entered
        Livewire.on('auto-verify', () => {
            $wire.verifyOtp();
        });

        // Handle focus next (backup method)
        Livewire.on('focus-next', ({
            index
        }) => {
            const nextInput = document.getElementById(`otp-${index}`);
            if (nextInput) {
                nextInput.focus();
            }
        });
    </script>
@endscript --}}
