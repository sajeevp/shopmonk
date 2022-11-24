<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-10">
                <div class="col-span-3">
                    @include('admin.sidebar')
                </div>
                <div class="col-span-9">
                    <h2 class="font-semibold text-3xl text-gray-800 leading-tight mb-6">
                        {{ __('Users') }}
                    </h2>
                    <div class="mt-10 sm:mt-0">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <table class="w-full text-left text-gray-900">
                                <thead class="text-bold uppercase bg-gray-300">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            ID
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Name
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Email
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Role
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $item)
                                        <tr class="bg-white border-b border-gray-300">
                                            <td class="py-4 px-6">
                                                {{ $item->id }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $item->name }}
                                            </td>
                                            <td class="py-4 px-6">
                                                {{ $item->email }}
                                            </td>
                                            <td class="py-4 px-6">
                                                @if ($item->role == 1)
                                                    Administrator
                                                @else
                                                    Customer
                                                @endif
                                            </td>
                                            <td class="py-4 px-6 text-right">
                                                <x-action-btn-link class="ml-2 bg-lime-600 hover:bg-lime-800"
                                                    :href="route('admin.edit_user', [
                                                        'user' => $item,
                                                    ])">
                                                    <svg class="w-4 h-4" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
                                                    </svg>
                                                </x-action-btn-link>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="bg-white border-b border-gray-300">
                                            <td class="py-4 px-6" colspan="4">{{ __('No users') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
