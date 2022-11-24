@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md h-12 shadow-sm border-gray-300 focus:border-rose-300 focus:ring focus:ring-rose-200 focus:ring-opacity-50']) !!}>
