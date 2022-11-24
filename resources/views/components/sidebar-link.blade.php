@props(['active'])

@php
$classes = $active ?? false ? 'inline-flex w-full py-3 px-10 text-base font-bold  text-white capitalize bg-slate-600' : 'inline-flex w-full py-3 px-10 text-base font-bold  text-white capitalize';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
