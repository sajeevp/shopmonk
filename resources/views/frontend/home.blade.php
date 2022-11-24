<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-12 mb-6 space-y-12 lg:space-y-0 lg:grid lg:grid-cols-2 lg:gap-x-6">
            <div class="group relative">
                <div
                    class="relative w-full h-full bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
                    <img src="images/2022-08-01_235658.jpg" alt="Desk mug."
                        class="w-full h-full object-left-top object-cover">
                </div>
                <div class="w-full h-full absolute inset-0 opacity-60 bg-gray-900"></div>
                <div class="absolute bottom-1/4 left-10">
                    <h2
                        class="text-2xl tracking-tight font-bold text-white sm:text-5xl sm:tracking-tight md:text-4xl md:tracking-tight">
                        <span class="block">Women’s Trendy</span>
                        <span class="block text-rose-600">Fashion Look Book</span>
                    </h2>
                    <div class="rounded-md shadow mt-5">
                        <x-btn-link class="text-white bg-pink-800 hover:bg-pink-600" :href="route('category.page', ['main_cat' => 'women'])">
                            {{ __('Shop now') }}
                        </x-btn-link>
                    </div>
                </div>

            </div>

            <div class="group">
                <div class="group relative">
                    <div
                        class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="images/2022-08-01_235621.jpg" alt="Desk mug."
                            class="w-full h-full object-left-top object-cover">
                    </div>
                    <div class="w-full h-full absolute inset-0 opacity-60 bg-gray-900"></div>
                    <div class="absolute bottom-1/4 left-10">
                        <h2
                            class="text-2xl tracking-tight font-bold text-white sm:text-5xl sm:tracking-tight md:text-4xl md:tracking-tight">
                            <span class="block">Men's Trends</span>
                        </h2>
                        <div class="rounded-md shadow mt-5">
                            <x-btn-link class="text-white bg-pink-800 hover:bg-pink-600" :href="route('category.page', ['main_cat' => 'man'])">
                                {{ __('Shop now') }}
                            </x-btn-link>
                        </div>
                    </div>
                </div>

                <div class="group relative mt-6">
                    <div
                        class="relative w-full h-80 bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 sm:h-64 lg:aspect-w-1 lg:aspect-h-1">
                        <img src="images/2022-08-01_234948.jpg" alt="Desk mug."
                            class="w-full h-full object-left-top object-cover">
                    </div>
                    <div class="w-full h-full absolute inset-0 opacity-60 bg-gray-900"></div>
                    <div class="absolute bottom-1/4 left-10">
                        <h2
                            class="text-2xl tracking-tight font-bold text-white sm:text-5xl sm:tracking-tight md:text-4xl md:tracking-tight">
                            <span class="block">
                                Premium Services
                            </span>
                        </h2>
                        <div class="rounded-md shadow mt-5">
                            <x-btn-link class="text-white bg-pink-800 hover:bg-pink-600" :href="route('home')">
                                {{ __('Shop now') }}
                            </x-btn-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="relative mb-12 w-full h-full bg-white rounded-lg overflow-hidden group-hover:opacity-75 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1 lg:aspect-h-1">
            <img src="images/2022-08-05_143042.jpg" alt="Desk mug." class="w-full h-full object-left-top object-cover">
        </div>
    </div>
</x-app-layout>
