<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                {{ __('Dashboard') }}
            </h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-xl uppercase pb-3 font-bold">Orders</h3>
                    <table class="w-full text-left text-gray-900">
                        <thead class="text-sm uppercase bg-gray-300">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Order ID
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Date
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Status
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Total
                                </th>
                                <th scope="col" class="py-3 px-6">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (auth()->user()->userOrders as $item)
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-4 px-6">
                                        {{ $item->id }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ date('d-m-Y', strtotime($item->created_at)) }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($item->status == '0')
                                            Pending
                                        @elseif ($item->status == '1')
                                            Processing
                                        @elseif ($item->status == '2')
                                            Shipped
                                        @elseif ($item->status == '3')
                                            Completed
                                        @elseif ($item->status == '4')
                                            Canceled
                                        @else
                                            Refunded
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="font-bold">INR {{ $item->total }}</span> for
                                        {{ $item->orderitems->sum('quantity') }} item(s)
                                    </td>
                                    <td class="text-right">
                                        <x-btn-link-small
                                            class="bg-pink-800 hover:bg-pink-600 text-white text-xs py-2 leading-tight"
                                            :href="route('order.view', ['id' => $item->id])">
                                            {{ __('View') }}
                                        </x-btn-link-small>
                                        @if ($item->status == '0')
                                            <x-btn-link-small
                                                class="bg-green-600 hover:bg-green-800 text-white text-xs py-2 ml-2 leading-tight"
                                                :href="route('order.payment', ['id' => $item->id])">
                                                {{ __('Pay Now') }}
                                            </x-btn-link-small>
                                        @endif
                                        @if ($item->status == '0' || $item->status == '1')
                                            <x-btn-link-small
                                                class="bg-red-600 hover:bg-red-800 text-white text-xs py-2 ml-2 leading-tight"
                                                :href="route('order.cancel', ['id' => $item->id])">
                                                {{ __('Cancel') }}
                                            </x-btn-link-small>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-4 px-6" colspan="4">{{ __('No orders found!') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
