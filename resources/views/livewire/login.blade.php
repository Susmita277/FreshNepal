<!-- Login Modal start-->

<div class="flex justify-center items-center py-24">
    <div class="w-[40%] bg-white p-8 rounded-md">
    <form method="dialog">
        <button class="outline-none  absolute right-5 top-5 ">✕</button>
    </form>

    <div class="text-center">
        <h4 class="font-bold text-lg">Agent Login</h4>
        <span class="text-gray-500  text-center ">Welcome back! Please enter your details to access your
            account.</span>
    </div>

    <form class="space-y-4 pt-8">
        <!-- phone -->
        <div> <input type="email" placeholder="Enter Your Email"
                class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"/>

        </div>

        <!-- Password -->
        <div>
            <div  class="relative">
                <input 
                    class="w-full p-2 border border-gray-200 dark:border-gray-700 rounded-md pr-10 outline-none"
                    name="password" autocomplete="current-password" placeholder="Enter your password" />
                <button type="button" 
                    class="absolute right-2.5 top-1/2 -translate-y-1/2 text-on-surface dark:text-on-surface-dark"
                    aria-label="Show password">
                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>

        </div>


        <button class="text-sm font-medium font-poppins bg-highlight py-2 px-5 text-white rounded-md w-full mt-4">Sign In</button>

        <div class="divider">OR</div>



        <div class="flex items-center text-center justify-center text-gray-500">
            <span>
                Don't have an account?
                <a class="link font-semibold" href="{{route('user-register')}}">Sign up</a>
            </span>
        </div>
    </form>
    </div>
</div>

<!--login modal end-->
