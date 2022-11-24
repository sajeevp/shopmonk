<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-main-heading>Complete payment</x-main-heading>
            <div class="mt-5">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <div class="shadow overflow-hidden sm:rounded-md">
                    <div class="px-4 py-5 bg-white sm:p-6">
                        <table class="w-full text-left text-gray-900">
                            <thead class="font-bold uppercase bg-gray-300">
                                <tr>
                                    <th class="py-3 px-6">ORDER NUMBER:</th>
                                    <th class="py-3 px-6">DATE:</th>
                                    <th class="py-3 px-6">TOTAL:</th>
                                    <th class="py-3 px-6">PAYMENT METHOD:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b border-gray-300">
                                    <td class="py-3 px-6">{{ $order->id }}</td>
                                    <td class="py-3 px-6">{{ date('d-m-Y', strtotime($order->created_at)) }}</td>
                                    <td class="py-3 px-6">INR {{ $order->total }}</td>
                                    <td class="py-3 px-6">Razorpay</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="font-bold text-xl text-center mt-5">Thank you for your order, please click the
                            button below to pay with Razorpay.</p>
                        {{-- <div class="text-center mt-5">
                            <x-btn-link id="rzp-button1"
                                class="cursor-pointer bg-green-600 hover:bg-green-800 text-white">
                                {{ __('Pay Now') }}
                            </x-btn-link>
                            <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                            <script>
                                var options = {
                                    "key": "{{ env('RAZORPAY_KEY') }}",
                                    "amount": "1000",
                                    "currency": "INR",
                                    "name": "ShopMonk",
                                    "description": "ShopMonk",
                                    "image": "https://www.dadymush.com/wp-content/uploads/2022/08/logoSilver.png",
                                    "handler": function(response) {
                                        //alert(response.razorpay_payment_id);
                                        $.ajax({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            type: "POST",
                                            url: "/order/complete",
                                            data: {
                                                order: "{{ $order->id }}",
                                                razorpay_payment_id: response.razorpay_payment_id
                                            },
                                            dataType: 'json',
                                            success: function(data) {
                                                console.log(data);
                                            },
                                            error: function(data) {
                                                console.log(data);
                                            }
                                        });
                                    },
                                    "prefill": {
                                        "name": "{{ $order->name }}",
                                        "email": "{{ $order->email }}",
                                        "contact": "{{ auth()->user()->userAddress->phone }}"
                                    },
                                    "notes": {
                                        "address": "Razorpay Corporate Office"
                                    },
                                    "theme": {
                                        "color": "#3399cc"
                                    }
                                };
                                var rzp1 = new Razorpay(options);
                                rzp1.on('payment.failed', function(response) {
                                    alert(response.error.description);
                                });
                                document.getElementById('rzp-button1').onclick = function(e) {
                                    rzp1.open();
                                    e.preventDefault();
                                }
                            </script>
                        </div> --}}
                        <form action="{{ route('order.complete') }}" method="POST">
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="1000"
                                data-buttontext="Pay 10 INR" data-name="ItSolutionStuff.com" data-description="Rozerpay"
                                data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png" data-prefill.name="{{ $order->name }}"
                                data-prefill.email="{{ $order->email }}" data-prefill.contact="{{ auth()->user()->userAddress->phone }}" data-theme.color="#ff7529"></script>
                                <input type="hidden" custom="Hidden Element" value="{{ $order->id }}" name="order">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
