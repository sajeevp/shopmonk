<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Order') }} - {{ $order->id }} <x-btn-link-small
                            class="ml-10 text-white bg-pink-600 hover:bg-pink-800" :href="route('admin.edit_order', [
                                'order' => $order,
                            ])">
                            {{ __('Update') }}
                        </x-btn-link-small>
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="grid grid-cols-12 gap-6">
                            <div class="col-span-7">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <h3 class="text-md uppercase pb-3 font-bold">Status : @if ($order->status == '0')
                                                Pending
                                            @elseif ($order->status == '1')
                                                Processing
                                            @elseif ($order->status == '2')
                                                Shipped
                                            @elseif ($order->status == '3')
                                                Completed
                                            @elseif ($order->status == '4')
                                                Canceled
                                            @else
                                                Refunded
                                            @endif
                                        </h3>
                                        <table class="w-full text-left text-gray-900">
                                            <tbody>
                                                @foreach ($order->orderitems as $item)
                                                    <tr class="bg-white border-b border-gray-300">
                                                        <td class="py-3">
                                                            <a
                                                                href="{{ route('product.page', ['slug' => $item->itemProduct->slug]) }}">
                                                                {{ $item->itemProduct->name }}
                                                            </a>
                                                        </td>
                                                        <td class="py-3 w-40 px-6">INR
                                                            {{ $item['price'] }} x {{ $item['quantity'] }}
                                                        </td>
                                                        <td class="py-3 w-40 px-6">INR
                                                            {{ $item['price'] * $item['quantity'] }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="bg-white border-b border-gray-300">
                                                    <td class="py-4 px-6 text-right" colspan="2">
                                                        <span class="font-bold uppercase">Subtotal</span>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <span class="font-bold uppercase">
                                                            INR {{ $order->sub_total }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-white">
                                                    <td class="py-4 px-6 text-right" colspan="2">
                                                        <span class="font-bold uppercase">Total</span>
                                                    </td>
                                                    <td class="py-4 px-6">
                                                        <span class="font-bold uppercase">
                                                            INR {{ $order->total }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        @if ($order->shipping_info)
                                            <h3 class="text-md uppercase mt-5 pb-1 font-bold">Shipping Info</h3>
                                            <p class="mb-10">{{ $order->shipping_info }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-5">
                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <h3 class="text-md uppercase pb-1 font-bold">Shipping Address</h3>
                                        <p class="font-bold">{{ $order->name }}</p>
                                        <p>{{ $order->address_1 }}<br> {{ $order->address_2 }}</p>
                                        <p>{{ $order->state }}, {{ $order->country }}, {{ $order->postcode }}</p>
                                        <p>{{ $order->phone }}</p>
                                        <p class="mb-10">{{ $order->email }}</p>
                                        <h3 class="text-md uppercase pb-1 font-bold">payment method</h3>
                                        <p class="mb-10">{{ $order->payment_method }}</p>
                                        <h3 class="text-md uppercase pb-1 font-bold">payment id</h3>
                                        <p class="mb-10">{{ $order->payment_id }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
