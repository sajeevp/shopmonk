<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-main-heading>Checkout</x-main-heading>
            <div class="mt-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form action="{{ route('order.proceed') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-12 gap-6">
                        <div class="md:col-span-7 col-span-12">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <table class="w-full text-left text-gray-900">
                                        <tbody>
                                            @forelse ($cart as $id => $item)
                                                <tr class="bg-white border-b border-gray-300">
                                                    <td class="py-3 text-md">
                                                        <a
                                                            href="{{ route('product.page', ['slug' => $item['slug']]) }}">
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
                                                    <td class="py-3 w-40 px-6">{{ $item['currency_code'] }}
                                                        {{ $item['selling_price'] }} x {{ $item['quantity'] }}</td>
                                                    <td class="py-3 w-40 px-6">{{ $item['currency_code'] }}
                                                        {{ $item['subtotal'] }}</td>
                                                </tr>
                                            @empty
                                                <tr class="bg-white border-b border-gray-300">
                                                    <td class="py-4 px-6" colspan="4">
                                                        <p class="font-bold uppercase">
                                                            {{ __('Your cart is currently empty.') }}
                                                        </p>
                                                        <p>Before proceed to checkout you must add some products to your
                                                            shopping cart.</p>
                                                    </td>
                                                </tr>
                                            @endforelse
                                            @if ($cart)
                                                <tr class="bg-white border-b border-gray-300">
                                                    <td class="py-4 px-6 text-right" colspan="2">
                                                        <span class="font-bold uppercase">Subtotal</span>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <span
                                                            class="font-bold uppercase">{{ collect($cart)->pluck('currency_code')->first() }}
                                                            {{ collect($cart)->pluck('subtotal')->sum() }}
                                                            <input type="hidden" name="sub_total"
                                                                value="{{ collect($cart)->pluck('subtotal')->sum() }}">
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white">
                                                    <td class="py-4 px-6 text-right" colspan="2">
                                                        <span class="font-bold uppercase">Total</span>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <span
                                                            class="font-bold uppercase">{{ collect($cart)->pluck('currency_code')->first() }}
                                                            {{ collect($cart)->pluck('subtotal')->sum() }}
                                                            <input type="hidden" name="total"
                                                                value="{{ collect($cart)->pluck('subtotal')->sum() }}">
                                                        </span>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="md:col-span-5 col-span-12">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div>
                                        <x-sub-heading>Billing & Shipping details</x-sub-heading>
                                        <div class="pt-6 pb-3">
                                            <x-label for="name" :value="__('Name')" />
                                            <x-input id="name" class="block mt-1 w-full" type="text"
                                                value="{{ $user->name }}" name="name" required />
                                        </div>
                                        <div class="pb-3">
                                            <x-label for="address_1" :value="__('Address')" />
                                            <x-input id="address_1" class="block mt-1 w-full" type="text"
                                                value="{{ $user->userAddress->address_1 }}" name="address_1"
                                                required />
                                            <x-input id="address_2" class="block mt-1 w-full" type="text"
                                                value="{{ $user->userAddress->address_2 }}" name="address_2"
                                                required />
                                        </div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="pb-3">
                                                <x-label for="state" :value="__('State')" />
                                                <x-input id="state" class="block mt-1 w-full" type="text"
                                                    value="{{ $user->userAddress->state }}" name="state" required />
                                            </div>
                                            <div class="pb-3">
                                                <x-label for="country" :value="__('Country')" />
                                                <x-input id="country" class="block mt-1 w-full" type="text"
                                                    value="India" readonly name="country" required />
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 gap-6">
                                            <div class="pb-3">
                                                <x-label for="postcode" :value="__('Postcode')" />
                                                <x-input id="postcode" class="block mt-1 w-full" type="text"
                                                    value="{{ $user->userAddress->postcode }}" name="postcode"
                                                    required />
                                            </div>
                                            <div class="pb-3">
                                                <x-label for="phone" :value="__('Phone')" />
                                                <x-input id="phone" class="block mt-1 w-full" type="text"
                                                    value="{{ $user->userAddress->phone }}" name="phone" required />
                                            </div>
                                        </div>
                                        <div class="pb-5">
                                            <x-label for="email" :value="__('Email address')" />
                                            <x-input id="email" class="block mt-1 w-full" type="email"
                                                value="{{ $user->email }}" name="email" required />
                                        </div>
                                        <div class="pb-3">
                                            <x-button class="ml-0">
                                                {{ __('Review & Proceed') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
