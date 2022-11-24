<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Add new attribute') }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('admin.store_attribute') }}" method="POST">
                            @csrf
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3">
                                            <x-label for="name" :value="__('Attribute name')" />
                                            <x-input id="name" class="block mt-1 w-full" type="text"
                                                :value="old('name')" name="name" required autofocus />
                                            <p class="mt-1 text-xs text-gray-600">The name is how it appears on your
                                                site.</p>
                                        </div>
                                        <div class="col-span-3">
                                            <x-label for="parent_id" :value="__('Parent attribute')" />
                                            <select name="parent_id" id="parent_id" required autofocus
                                                class="block mt-1 w-full rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                                                <option selected value="0">Main attribute</option>
                                                @foreach ($attributes as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            <p class="mt-1 text-xs text-gray-600">Assign a parent term to create a
                                                hierarchy.</p>
                                        </div>
                                        <div class="col-span-6">
                                            <x-label for="description" :value="__('Description')" />
                                            <x-textarea id="description" class="block mt-1 w-full" rows="3"
                                                name="description" required autofocus>
                                                {{ old('description') }} </x-textarea>
                                            <p class="mt-1 text-xs text-gray-600">The description is not prominent by
                                                default; however, some themes may show it.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <x-button class="ml-5">
                                        {{ __('Save') }}
                                    </x-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
