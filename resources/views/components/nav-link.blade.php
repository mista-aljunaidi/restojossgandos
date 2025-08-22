@props(['active' => false])

@php
    // Tentukan apakah link ini aktif
    $isActive = request()->is(ltrim($attributes->get('href'), '/')) || request()->is(ltrim($attributes->get('href'), '/').'/*');

    $classes = $isActive
        ? 'text-red-600 font-semibold'
        : 'text-black hover:text-red-600';
@endphp

<a {{ $attributes->merge(['class' => $classes . ' rounded-b-md px-3 py-2 text-sm font-medium']) }}
   aria-current="{{ $isActive ? 'page' : false }}">
    {{ $slot }}
</a>