<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex justify-center py-3 px-10 border border-transparent shadow-sm text-base font-bold rounded-md text-white bg-pink-800 hover:bg-pink-600']) }}>
    {{ $slot }}
</button>
