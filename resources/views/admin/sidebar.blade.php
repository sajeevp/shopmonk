<div class="bg-slate-900 min-h-full h-96">
    <ul class="divide-y divide-solid divide-slate-600">
        <li>
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M13,3V9H21V3M13,21H21V11H13M3,21H11V15H3M3,13H11V3H3V13Z" />
                </svg>
                {{ __('Dashboard') }}
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12,5.5A3.5,3.5 0 0,1 15.5,9A3.5,3.5 0 0,1 12,12.5A3.5,3.5 0 0,1 8.5,9A3.5,3.5 0 0,1 12,5.5M5,8C5.56,8 6.08,8.15 6.53,8.42C6.38,9.85 6.8,11.27 7.66,12.38C7.16,13.34 6.16,14 5,14A3,3 0 0,1 2,11A3,3 0 0,1 5,8M19,8A3,3 0 0,1 22,11A3,3 0 0,1 19,14C17.84,14 16.84,13.34 16.34,12.38C17.2,11.27 17.62,9.85 17.47,8.42C17.92,8.15 18.44,8 19,8M5.5,18.25C5.5,16.18 8.41,14.5 12,14.5C15.59,14.5 18.5,16.18 18.5,18.25V20H5.5V18.25M0,20V18.5C0,17.11 1.89,15.94 4.45,15.6C3.86,16.28 3.5,17.22 3.5,18.25V20H0M24,20H20.5V18.25C20.5,17.22 20.14,16.28 19.55,15.6C22.11,15.94 24,17.11 24,18.5V20Z" />
                </svg>{{ __('Users') }}
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link :href="route('admin.categories')" :active="request()->routeIs('admin.categories')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M7 7H9V9H7V7M7 11H9V13H7V11M7 15H9V17H7V15M17 17H11V15H17V17M17 13H11V11H17V13M17 9H11V7H17V9Z" />
                </svg>{{ __('Categories') }}
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link :href="route('admin.attributes')" :active="request()->routeIs('admin.attributes')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19 3H14.82C14.4 1.84 13.3 1 12 1S9.6 1.84 9.18 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3M12 3C12.55 3 13 3.45 13 4S12.55 5 12 5 11 4.55 11 4 11.45 3 12 3M7 7H17V5H19V19H5V5H7V7M12 17V15H17V17H12M12 11V9H17V11H12M8 12V9H7V8H9V12H8M9.25 14C9.66 14 10 14.34 10 14.75C10 14.95 9.92 15.14 9.79 15.27L8.12 17H10V18H7V17.08L9 15H7V14H9.25" />
                </svg>{{ __('Attributes') }}
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link :href="route('admin.products')" :active="request()->routeIs('admin.products')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19,8V5H5V8H9A3,3 0 0,0 12,11A3,3 0 0,0 15,8H19M19,3A2,2 0 0,1 21,5V12A2,2 0 0,1 19,14H5A2,2 0 0,1 3,12V5A2,2 0 0,1 5,3H19M3,15H9A3,3 0 0,0 12,18A3,3 0 0,0 15,15H21V19A2,2 0 0,1 19,21H5A2,2 0 0,1 3,19V15Z" />
                </svg>{{ __('Products') }}
            </x-sidebar-link>
        </li>
        <li>
            <x-sidebar-link :href="route('admin.orders')" :active="request()->routeIs('admin.orders')">
                <svg class="w-6 h-6 mr-2" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z" />
                </svg>{{ __('Orders') }}
            </x-sidebar-link>
        </li>
    </ul>
</div>
