<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Edit user') }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('admin.update_user', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-3">
                                            <x-label for="name" :value="__('Name')" />
                                            <x-input id="name" class="block mt-1 w-full" type="text"
                                                value="{{ $user->name }}" name="name" required autofocus />
                                        </div>
                                        <div class="col-span-3">
                                            <x-label for="role" :value="__('Role')" />
                                            <select name="role" id="role" required
                                                class="block mt-1 w-full rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50">
                                                <option {{ $user->role == 0 ? 'selected' : '' }} value="0">Customer
                                                </option>
                                                <option {{ $user->role == 1 ? 'selected' : '' }} value="1">
                                                    Administrator
                                                </option>
                                            </select>
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
