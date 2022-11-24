<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Orders') }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mb-5">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <table class="w-full text-left text-gray-900">
                                <thead class="text-bold uppercase bg-gray-300">
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
                                    @forelse ($orders as $item)
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
                                                <span class="font-bold">INR {{ $item->total }}</span>
                                                for
                                                {{ $item->orderitems->sum('quantity') }} item(s)
                                            </td>
                                            <td class="py-4 px-6 w-40 text-right">
                                                <x-action-btn-link class="ml-2 bg-lime-600 hover:bg-lime-800"
                                                    :href="route('order.view', [
                                                        'id' => $item->id,
                                                    ])">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 4.5C7 4.5 2.7 7.6 1 12C2.7 16.4 7 19.5 12 19.5H13.1C13 19.2 13 18.9 13 18.5C13 17.9 13.1 17.4 13.2 16.8C12.8 16.9 12.4 17 12 17C9.2 17 7 14.8 7 12S9.2 7 12 7 17 9.2 17 12C17 12.3 17 12.6 16.9 12.9C17.6 12.7 18.3 12.5 19 12.5C20.2 12.5 21.3 12.8 22.3 13.5C22.6 13 22.8 12.5 23 12C21.3 7.6 17 4.5 12 4.5M12 9C10.3 9 9 10.3 9 12S10.3 15 12 15 15 13.7 15 12 13.7 9 12 9M19 21V19H15V17H19V15L22 18L19 21" />
                                                    </svg>
                                                </x-action-btn-link>
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
                        {!! $orders->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
