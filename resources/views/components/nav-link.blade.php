@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-lime-400 text-sm font-medium
               leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition
               duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-transparent text-sm
               font-medium leading-5 text-gray-500 hover:text-gray-100 hover:border-rose-300
               focus:outline-none focus:text-gray-100 focus:border-rose-300 transition
               duration-500 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
