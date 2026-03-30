<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-bg">

    @livewire('header')

    {{ $slot }}

     <div
    x-data="{
        toasts: [],
        addToast(type, message) {
            const id = Date.now();
            this.toasts.push({ id, type, message });
            setTimeout(() => this.removeToast(id), 3000);
        },
        removeToast(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    x-on:toast.window="addToast($event.detail[0].type, $event.detail[0].message)"
    class="fixed bottom-6 right-6 z-[999] flex flex-col gap-3"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-show="true"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            class="flex items-center gap-3 px-5 py-3 rounded-xl shadow-lg text-white text-sm font-inter font-medium min-w-[220px]" style="background-color: #FD5F3E;">
            {{-- icon --}}
            <template x-if="toast.type === 'success'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </template>
            <template x-if="toast.type === 'exists'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z" />
                </svg>
            </template>
            <template x-if="toast.type === 'error'">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </template>

            <span x-text="toast.message"></span>

            <button @click="removeToast(toast.id)" class="ml-auto opacity-70 hover:opacity-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </template>
</div>
    <x-partials.footer />
    
</body>

</html>
