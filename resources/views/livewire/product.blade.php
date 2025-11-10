<div class="px-24 py-12">
    <h2 class="text-2xl tracking-relaxed leading-relaxed font-medium font-poppins text-gray-800 border-b border-gray-200 pb-8 ">All products in one
        place</h2>
    <div class="grid grid-cols-5 gap-10 relative mt-8">
        <div class="w-full sticky top-10 left-0 bottom-0 h-fit  ">
            <h4 class="text-lg tracking-tight font-medium font-poppins">Fliter Options</h4>
            <ul class="mt-4">
                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800">Category</h4>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="checkbox" class="bg-none border-none border border-gray-200 w-4 h-4">
                    <p class="text-md tracking-relaxed font-medium font-inter text-gray-800"> Vegetables</p>
                </li>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="checkbox" class="bg-none border-none border border-gray-200 w-4 h-4">
                    <p class="text-md tracking-relaxed font-medium font-inter text-gray-800"> Fruits</p>
                </li>
            </ul>
            <ul class="mt-4">
                <h4 class="text-md tracking-relaxed font-medium font-inter text-gray-800">Price</h4>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="checkbox" class="bg-none border-none border border-gray-200 w-4 h-4">

                    <p class="text-md tracking-relaxed font-medium font-inter text-gray-800">High to low</p>
                </li>
                <li class="flex gap-x-2 my-2 items-center">
                    <input type="checkbox" class="bg-none border-none border border-gray-200 w-4 h-4">
                    <p class="text-md tracking-relaxed font-medium font-inter text-gray-800"> Low to high</p>
                </li>
            </ul>

        </div>
        <div class="col-span-4 grid grid-cols-4 gap-x-4 gap-y-6">
            <x-partials.product.card />
            <x-partials.product.card />
            <x-partials.product.card />
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
