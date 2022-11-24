<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        Update {{ __('Order') }} - {{ $order->id }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">

                                <form action="{{ route('admin.update_order', ['id' => $order->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="pb-6">
                                        <x-label for="status" :value="__('Select status')" />
                                        <select name="status" id="status" required autofocus
                                            class="block mt-1 w-full rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                                            <option {{ $order->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $order->status == '1' ? 'selected' : '' }} value="1">
                                                Processing
                                            </option>
                                            <option {{ $order->status == '2' ? 'selected' : '' }} value="2">Shipped
                                            </option>
                                            <option {{ $order->status == '3' ? 'selected' : '' }} value="3">
                                                Completed
                                            </option>
                                            <option {{ $order->status == '4' ? 'selected' : '' }} value="4">
                                                Canceled
                                            </option>
                                            <option {{ $order->status == '5' ? 'selected' : '' }} value="5">
                                                Refunded
                                            </option>
                                        </select>
                                    </div>
                                    <div class="pb-6">
                                        <x-label for="shipping_info" :value="__('Shipping information')" />
                                        <textarea
                                            class="rounded-md shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 block mt-1 w-full"
                                            name="shipping_info" id="shipping_info" rows="4" autofocus> {{ $order->shipping_info }} </textarea>
                                    </div>
                                    <div class="py-3 bg-gray-50 text-left">
                                        <x-button class="ml-0">
                                            {{ __('Update') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
