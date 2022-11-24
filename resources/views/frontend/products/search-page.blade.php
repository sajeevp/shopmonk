<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!count($products))
                <p>No products found!</p>
            @endif
            <div class="pb-6 grid grid-cols-4 gap-6">
                @foreach ($products as $item)
                    <div class="bg-gray-50 shadow group">
                        <a href="{{ route('product.page', ['slug' => $item->slug]) }}">
                            @if ($item->productImages->first())
                                <img class="w-full h-auto"
                                    src="{{ asset('uploads/product/' . $item->productImages->first()->file_name) }}"
                                    alt="">
                            @else
                                <img class="w-full h-auto" src="{{ asset('images/default620x480.jpg') }}" />
                            @endif
                            <div class="relative overflow-hidden">
                                <div class="text-sm px-5 pt-3 font-semibold text-center text-gray-600">Size:
                                    {{ $item->size->name }}, Color:
                                    {{ $item->color->name }}</div>
                                <div class="text-sm px-5 pb-3 font-semibold text-center text-lime-600">
                                    {{ $item->stock_quantity }} in stock</div>
                                <div class="text-m px-5 pb-1 font-semibold text-center truncate">
                                    {{ $item->name }}
                                </div>
                                <h3 class="text-m uppercase px-5 pb-0 font-bold text-center text-rose-600">
                                    {{ $item->currency_code }} {{ $item->selling_price }}</h3>
                                <h3 class="text-sm line-through uppercase px-5 pb-5 text-center text-gray-600">
                                    {{ $item->currency_code }} {{ $item->regular_price }}</h3>
                                @if ($item->stock_quantity > 0)
                                    <div
                                        class="flex transition-all justify-center items-center absolute h-full w-full group-hover:top-0 top-full left-0 bg-rose-500">
                                        <a href="{{ route('product.addtocart', ['id' => $item->id]) }}"
                                            class="border-white text-sm border-2 py-1 px-5 uppercase text-white hover:border-4">
                                            <svg class="w-5 h-5 inline" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M11 9H13V6H16V4H13V1H11V4H8V6H11M7 18C5.9 18 5 18.9 5 20S5.9 22 7 22 9 21.1 9 20 8.1 18 7 18M17 18C15.9 18 15 18.9 15 20S15.9 22 17 22 19 21.1 19 20 18.1 18 17 18M7.2 14.8V14.7L8.1 13H15.5C16.2 13 16.9 12.6 17.2 12L21.1 5L19.4 4L15.5 11H8.5L4.3 2H1V4H3L6.6 11.6L5.2 14C5.1 14.3 5 14.6 5 15C5 16.1 5.9 17 7 17H19V15H7.4C7.3 15 7.2 14.9 7.2 14.8Z" />
                                            </svg> <span>Add to cart</span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {!! $products->withQueryString()->links() !!}
        </div>
    </div>
</x-app-layout>
