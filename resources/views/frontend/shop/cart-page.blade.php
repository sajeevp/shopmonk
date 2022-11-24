<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-main-heading>Cart</x-main-heading>
            <div class="mt-5">
                <div class="overflow-x-auto relative shadow-md sm:rounded-lg mb-5">
                    <table class="w-full text-left text-gray-900">
                        <thead class="font-bold uppercase bg-gray-300">
                            <tr>
                                <th class="py-3 px-6">Product</th>
                                <th class="py-3 px-6">Price</th>
                                <th class="py-3 px-6">Quantity</th>
                                <th class="py-3 px-6">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($cart as $id => $item)
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-3 px-6">
                                        <a href="{{ route('product.page', ['slug' => $item['slug']]) }}">
                                            @if ($item['image'])
                                                <img class="w-12 h-auto inline"
                                                    src="{{ asset('uploads/product/' . $item['image']) }}"
                                                    alt="">
                                            @else
                                                <img class="w-12 h-auto inline"
                                                    src="{{ asset('images/default620x480.jpg') }}" />
                                            @endif
                                            <span class="ml-3">{{ $item['name'] }}</span>
                                        </a>
                                    </td>
                                    <td class="py-3 px-6">{{ $item['currency_code'] }} {{ $item['selling_price'] }}</td>
                                    <td class="py-3 px-6 align-middle">
                                        @if ($item['quantity'] > 1)
                                            <a href="{{ route('product.minusfromcart', ['id' => $id]) }}"
                                                class="text-white rounded-full inline-block">
                                                <svg class="w-5 h-5 fill-lime-700" viewBox="0 0 24 24">
                                                    <path
                                                        d="M17,13H7V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                                </svg>
                                            </a>
                                        @else
                                            <a href="{{ route('product.removefromcart', ['id' => $id]) }}"
                                                class="text-white rounded-full inline-block">
                                                <svg class="w-5 h-5 fill-red-700" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12,2C17.53,2 22,6.47 22,12C22,17.53 17.53,22 12,22C6.47,22 2,17.53 2,12C2,6.47 6.47,2 12,2M15.59,7L12,10.59L8.41,7L7,8.41L10.59,12L7,15.59L8.41,17L12,13.41L15.59,17L17,15.59L13.41,12L17,8.41L15.59,7Z" />
                                                </svg>
                                            </a>
                                        @endif
                                        <span class="inline-block p-2 border">
                                            {{ $item['quantity'] }}</span>
                                        <a href="{{ route('product.addtocart', ['id' => $id]) }}"
                                            class="text-white rounded-full inline-block">
                                            <svg class="w-5 h-5 fill-lime-700" viewBox="0 0 24 24">
                                                <path
                                                    d="M17,13H13V17H11V13H7V11H11V7H13V11H17M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="py-3 px-6">{{ $item['currency_code'] }} {{ $item['subtotal'] }}</td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-4 px-6" colspan="4">
                                        <p class="font-bold uppercase">
                                            {{ __('Your cart is currently empty.') }}
                                        </p>
                                        <p>Before proceed to checkout you must add some products to your shopping cart.
                                        </p>
                                    </td>
                                </tr>
                            @endforelse
                            @if ($cart)
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-4 px-6 text-right" colspan="3">
                                        <span class="font-bold uppercase">Subtotal</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="font-bold uppercase">{{ collect($cart)->pluck('currency_code')->first() }}
                                            {{ collect($cart)->pluck('subtotal')->sum() }}
                                        </span>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-4 px-6 text-right" colspan="3">
                                        <span class="font-bold uppercase">Total</span>
                                    </td>
                                    <td class="py-4 px-6">
                                        <span
                                            class="font-bold uppercase">{{ collect($cart)->pluck('currency_code')->first() }}
                                            {{ collect($cart)->pluck('subtotal')->sum() }}
                                        </span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($cart)
                    <div class="text-right">
                        <x-btn-link class="bg-green-600 hover:bg-green-800 text-white" :href="route('home')">
                            {{ __('Continue Shopping') }}
                        </x-btn-link>
                        <x-btn-link class="text-white bg-pink-800 hover:bg-pink-600 ml-2" :href="route('checkout')">
                            {{ __('Proceed to checkout') }}
                        </x-btn-link>
                    </div>
                @endif
            </div>
            <div></div>
        </div>
    </div>
</x-app-layout>
