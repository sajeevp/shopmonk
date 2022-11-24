<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Edit product') }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="shadow mb-5 overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <form action="{{ route('admin.store_product_images', ['id' => $product->id]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="pb-6 grid grid-cols-6 gap-6">
                                        @foreach ($product->productImages as $item)
                                            <div>
                                                <img class="w-full"
                                                    src="{{ asset('uploads/product/' . $item->file_name) }}"
                                                    alt="">
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="pb-6">
                                        <x-label for="file_name" :value="__('Upload image')" />
                                        <div class="grid grid-cols-12 gap-6">
                                            <div class="col-span-7">
                                                <input required multiple
                                                    class="p-3 w-full rounded-md border border-gray-300 text-lg shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50"
                                                    id="file_name" type="file" name="file_name[]">
                                            </div>
                                            <div class="col-span-5">
                                                <x-button>
                                                    {{ __('Upload') }}
                                                </x-button>
                                            </div>
                                        </div>
                                        <p class="mt-1 text-xs text-gray-600">
                                            PNG, JPG, JPEG up to 2MB.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('admin.update_product', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-7">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="pb-6">
                                                <x-label for="name" :value="__('Product name')" />
                                                <x-input id="name" class="block mt-1 w-full" type="text"
                                                    value="{{ $product->name }}" name="name" required autofocus />
                                            </div>
                                            <div class="grid grid-cols-12 gap-6 pb-6">
                                                <div class="col-span-4">
                                                    <x-label for="regular_price" :value="__('Regular price')" />
                                                    <x-price-input id="regular_price"
                                                        value="{{ $product->regular_price }}" name="regular_price"
                                                        icon="INR" class="block mt-1 w-full" type="text" required
                                                        autofocus></x-price-input>
                                                </div>
                                                <div class="col-span-4">
                                                    <x-label for="selling_price" :value="__('Selling price')" />
                                                    <x-price-input id="selling_price"
                                                        value="{{ $product->selling_price }}" name="selling_price"
                                                        icon="INR" class="block mt-1 w-full" type="text" required
                                                        autofocus></x-price-input>
                                                </div>
                                                <div class="col-span-4">
                                                    <x-label for="stock_quantity" :value="__('Stock quantity')" />
                                                    <x-input id="stock_quantity" class="block mt-1 w-full"
                                                        type="text" value="{{ $product->stock_quantity }}"
                                                        name="stock_quantity" required autofocus />
                                                </div>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="short_description" :value="__('Short description')" />
                                                <textarea
                                                    class="rounded-md shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 block mt-1 w-full"
                                                    name="short_description" id="short_description" rows="2" required autofocus> {{ $product->short_description }}</textarea>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="description" :value="__('Description')" />
                                                <textarea
                                                    class="rounded-md shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 block mt-1 w-full"
                                                    name="description" id="description" rows="4" required autofocus> {{ $product->description }} </textarea>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="meta_title" :value="__('Meta title')" />
                                                <x-input id="meta_title" class="block mt-1 w-full" type="text"
                                                    value="{{ $product->meta_title }}" name="meta_title" autofocus />
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="meta_keyword" :value="__('Meta keyword')" />
                                                <x-input id="meta_keyword" class="block mt-1 w-full" type="text"
                                                    value="{{ $product->meta_keyword }}" name="meta_keyword"
                                                    autofocus />
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="meta_description" :value="__('Meta description')" />
                                                <textarea
                                                    class="rounded-md shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50 block mt-1 w-full"
                                                    name="meta_description" id="meta_description" rows="2" autofocus> {{ $product->meta_description }} </textarea>
                                            </div>
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                            <x-button class="ml-5">
                                                {{ __('Save') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-5">
                                    <div class="shadow overflow-hidden sm:rounded-md">
                                        <div class="px-4 py-5 bg-white sm:p-6">
                                            <div class="pb-6">
                                                <x-label for="category_id" :value="__('Select category')" />
                                                <div>
                                                    <ul>
                                                        @foreach ($categories as $item)
                                                            <li class="mb-1">
                                                                <label class="block p-2 text-bold bg-gray-300"
                                                                    for="category_id">{{ $item->name }}</label>
                                                                @if (count($item->subcategories))
                                                                    <ul class="border p-3 pt-0 overflow-hidden">
                                                                        @foreach ($item->subcategories as $item)
                                                                            <li class="mt-1">
                                                                                <svg class="w-4 h-4 inline"
                                                                                    viewBox="0 0 24 24">
                                                                                    <path fill="currentColor"
                                                                                        d="M10,17L15,12L10,7V17Z" />
                                                                                </svg>
                                                                                <input type="radio" required
                                                                                    name="category_id"
                                                                                    class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                                                    {{ $product->category_id == $item->id ? 'checked' : '' }}
                                                                                    value="{{ $item->id }}">
                                                                                <label
                                                                                    class="ml-2 text-sm text-gray-900"
                                                                                    for="category_id">{{ $item->name }}</label>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="color_id" :value="__('Select color')" />
                                                <select name="color_id" id="color_id" required autofocus
                                                    class="block mt-1 w-full rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                                                    <option value="">
                                                        Select one
                                                    </option>
                                                    @foreach ($colors as $item)
                                                        <option {{ $product->color_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="size_id" :value="__('Select size')" />
                                                <select name="size_id" id="size_id" required autofocus
                                                    class="block mt-1 w-full rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                                                    <option value="">Select one</option>
                                                    @foreach ($size as $item)
                                                        <option {{ $product->size_id == $item->id ? 'selected' : '' }}
                                                            value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="trending" :value="__('Is trending')" />
                                                <ul class="flex">
                                                    <li class="mr-3">
                                                        <input type="radio" required name="trending"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->trending == '1' ? 'checked' : '' }}
                                                            value="1">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="trending">Yes</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" required name="trending"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->trending == '0' ? 'checked' : 'checked' }}
                                                            value="0">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="trending">No</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="featured" :value="__('Is featured')" />
                                                <ul class="flex">
                                                    <li class="mr-3">
                                                        <input type="radio" required name="featured"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->featured == '1' ? 'checked' : '' }}
                                                            value="1">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="featured">Yes</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" required name="featured"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->featured == '0' ? 'checked' : 'checked' }}
                                                            value="0">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="featured">No</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="pb-6">
                                                <x-label for="status" :value="__('Is active')" />
                                                <ul class="flex">
                                                    <li class="mr-3">
                                                        <input type="radio" required name="status"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->status == '0' ? 'checked' : 'checked' }}
                                                            value="0">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="status">Yes</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" required name="status"
                                                            class="h-5 w-5 text-rose-600 focus:ring-rose-500 border-gray-500"
                                                            {{ $product->status == '1' ? 'checked' : '' }}
                                                            value="1">
                                                        <label class="ml-2 text-sm text-gray-900"
                                                            for="status">No</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
