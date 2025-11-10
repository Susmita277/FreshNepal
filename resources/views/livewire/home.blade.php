<div class="py-12 px-24 ">
    <div class="grid grid-cols-2 gap-30">
        <div>
            <h1 class="font-poppins font-medium text-5xl tracking-normal leading-normal">Connecting You With Fresh
                Harvests
            </h1>
            <p class="flex text-sm font-inter tracking-relaxed line-spacing-1 font-medium text-gray-700 py-2">
                Get fresh fruits and vegetables from many trusted sellers in one place.
                Enjoy healthy and tasty food every day.
            </p>
            <div
                class="bg-highlight  pl-8 pr-1  w-[160px] py-2 flex gap-3 rounded-full mt-8 items-center justify-center">
                <p class="text-sm font-poppins font-medium text-white">Shop Now</p>
                <div class="w-8 h-8 rounded-full bg-white flex justify-center items-center p-1">
                    <div class="h-3 w-3"> <img src="vegetables.png" class="object-cover w-full h-full"></div>
                </div>
            </div>

        </div>
        <div class="w-full h-[400px] transfrom -translate-y-[5%] ">
            <img src="banner.png" class="w-full h-full object-cover  ">
        </div>
    </div>
    <div class="grid grid-cols-2 gap-10">
        <div class="grid grid-cols-2 gap-8 rounded-md bg-green-100 h-[200px]">
            <div class="p-8">
                <span class="text-highlight text-sm font-inter tracking-relaxed">vegetables</span>
                <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins py-2">Vegetables
                    Collections</h2>
                <button
                    class="outline-none border-none bg-white rounded-full px-5 py-3 flex justify-center text-center text-xs font-poppins">Shop
                    Now</button>
            </div>
            <div class="h-[200px] w-full overflow-hidden">
                <img src="vegetable-collection.png" class="w-full h-full object-contain">
            </div>
        </div>
        <div class="grid grid-cols-2 gap-8 rounded-md bg-orange-100 h-[200px]">
            <div class="p-8">
                <span class="text-highlight text-sm font-inter tracking-relaxed">fruits</span>
                <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins py-2">Fresh Fruits
                    Collections</h2>
                <button
                    class="outline-none border-none bg-white rounded-full px-5 py-3 flex justify-center text-center text-xs font-poppins">Shop
                    Now</button>
            </div>
            <div class="h-[200px] w-full overflow-hidden">
                <img src="fruits.png" class="w-full h-full object-contain">
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins">Seasonals Items</h2>
            <div
                class="gap-2 border rounded-sm  border-[#000000] px-5 py-2 flex hover:border-none hover:bg-highlight hover:text-white transition-all smooth cursor-pointer">
                <p class="text-xs font-poppins">View More</p>
                <x-heroicon-s-arrow-up-right class="w-4 h-4" />
            </div>
        </div>
        <div class="pt-8 grid grid-cols-5 gap-4">
            <div class="bg-white rounded-3xl fit p-5 h-[230px] flex flex-col items-center relative">
                <div class="h-[100px] ">
                    <img src="https://png.pngtree.com/png-clipart/20250416/original/pngtree-red-capsicum-png-image_20700375.png"
                        class="object-contain cl
                    w-full h-full">
                </div>
                <div class=" mt-2 ">
                    <h3 class="text-xl font-medium font-poppins text-center">Capsicum</h3>
                    <p class="font-inter tracking-tight line-spacing-1 font-medium text-gray-500 text-sm text-center">
                        Leaf Vegetables / kg</p>
                </div>
                <div class="flex items-end justify-center relative">
                    <h4 class="mt-4 text-md  font-medium font-poppins text-highlight text-center ">NPR.80</h4>
                    <x-heroicon-o-plus-circle class="w-5 h-5 absolute top-0 -right-15 top-4 cursor-pointer" />
                </div>
                <div
                    class="w-fit h-fit rounded-full p-1 text-white bg-green-400 text-xs tracking-tight font-inter flex justify-center items-center absolute top-2 left-2">
                    5% off
                </div>
            </div>
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
        </div>
    </div>

    {{-- dispaly categorywise --}}
    <div class="py-12">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins">Fresh Vegetables</h2>
            <div
                class="gap-2 border rounded-sm  border-[#000000] px-5 py-2 flex hover:border-none hover:bg-highlight hover:text-white transition-all smooth cursor-pointer">
                <p class="text-xs font-poppins">View More</p>
                <x-heroicon-s-arrow-up-right class="w-4 h-4" />
            </div>
        </div>
        <div class="pt-8 grid grid-cols-5 gap-x-4 gap-y-8">
            <div class="bg-white rounded-3xl fit p-5 h-[230px] flex flex-col items-center relative">
                <div class="h-[100px] ">
                    <img src="https://png.pngtree.com/png-clipart/20250416/original/pngtree-red-capsicum-png-image_20700375.png"
                        class="object-contain cl
                    w-full h-full">
                </div>
                <div class=" mt-2 ">
                    <h3 class="text-xl font-medium font-poppins text-center">Capsicum</h3>
                    <p class="font-inter tracking-tight line-spacing-1 font-medium text-gray-500 text-sm text-center">
                        Leaf Vegetables / kg</p>
                </div>
                <div class="flex items-end justify-center relative">
                    <h4 class="mt-4 text-md  font-medium font-poppins text-highlight text-center ">NPR.80</h4>
                    <x-heroicon-o-plus-circle class="w-5 h-5 absolute top-0 -right-15 top-4 cursor-pointer" />
                </div>
             
            </div>
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
        </div>
    </div>
</div>
