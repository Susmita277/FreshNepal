    <div x-data="otpForm()" x-init="startTimer()">

        <div class="flex flex-col" x-show="!otpSent">
            <h1 class="font-display text-2xl font-bold text-gray-800 dark:text-gray-100 text-center">
                Verify Your Identity
            </h1>
            <p class="mt-2 font-display text-sm text-gray-600 dark:text-gray-400 text-center">
                Enter your email we'll send you a verification code.
            </p>
            <div class="mt-6">
                <input
                    class="h-12 w-full rounded-lg border border-gray-300 bg-transparent px-4 text-gray-800 transition-colors duration-200 focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight"
                    placeholder="Enter email " type="text" wire:model="email" />
                @error('email')
                    <p class="text-red-500 text-sm font-inter">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-8">
                <a class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90"
                    href="#verify-form">
                    <span class="truncate" wire:click.prevent="sendOtp">Send OTP</span>
                </a>
            </div>
        </div>
        <div class="flex-col" x-show="otpSent">
            <h1 class="font-display text-2xl font-bold text-gray-800 dark:text-gray-100">
                Enter Verification Code
            </h1>
            <p class="mt-2 font-display text-sm text-gray-600 dark:text-gray-400">
                We've sent a 6-digit code to your device. Please enter it below to continue.
            </p>
            <div class="mt-6 flex justify-center">
                <fieldset class="relative flex gap-2 sm:gap-3">
                    <template x-for="('digit,'index') in 6" :key="index">
                        <input
                            class="flex h-14 w-12 rounded-lg border border-gray-300 bg-transparent text-center text-xl font-medium text-gray-800 transition-colors duration-200 [appearance:textfield] focus:border-highlight focus:outline-0 focus:ring-0 dark:border-gray-600 dark:text-gray-200 dark:focus:border-highlight [&amp;::-webkit-inner-spin-button]:appearance-none [&amp;::-webkit-outer-spin-button]:appearance-none"
                            maxlength="6" type="number" value="" wire:model="otp[index]" x-ref="otpField" />
                    </template>

                </fieldset>
            </div>
            <div class="mt-8">
                <button
                    class="flex w-full cursor-pointer items-center justify-center overflow-hidden rounded-lg h-12 bg-highlight text-base font-bold text-white transition-colors hover:bg-opacity-90">
                    <span class="truncate" wire:click.prevent="verifyOtp">Verify</span>
                </button>
            </div>
            <div class="mt-6 font-display text-sm text-gray-600 dark:text-gray-400">
                <p>
                    Resend code in <span class="font-semibold text-gray-800 dark:text-gray-200">00:59</span>
                </p>
            </div>
        </div>
    </div>

    <style>
        #otp-form:not(:target)~#verify-form {
            display: none;
        }

        #otp-form:target~#verify-form {
            display: flex;
        }

        #otp-form:target~#otp-form {
            display: none;
        }
    </style>
