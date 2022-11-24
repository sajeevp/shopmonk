<div class="relative">
    @if ($icon == 'INR')
        <span class="absolute rounded-l-md h-full bg-gray-300 py-4 px-2">
            <svg class="w-4 h-4" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M13.66 7C13.1 5.82 11.9 5 10.5 5H6V3H18V5H14.74C15.22 5.58 15.58 6.26 15.79 7H18V9H16C15.73 11.8 13.37 14 10.5 14H9.77L16.5 21H13.73L7 14V12H10.5C12.26 12 13.72 10.7 13.96 9H6V7H13.66Z" />
            </svg>
        </span>
    @else
    @endif
    <input
        {{ $attributes->merge([
            'class' => 'rounded-md h-12 pl-10 shadow-sm border-gray-300 focus:border-rose-300 focus:ring
                            focus:ring-rose-200 focus:ring-opacity-50',
        ]) }}>

</div>
