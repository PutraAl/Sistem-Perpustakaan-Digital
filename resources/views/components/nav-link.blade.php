@props(['active'])

@php
$classes = ($active ?? false)
    ? 'flex items-center gap-3 px-4 py-2.5 rounded-r-xl border-l-4 border-blue-500 bg-slate-800 text-white font-medium'
    : 'flex items-center gap-3 px-4 py-2.5 text-slate-300 hover:bg-slate-800 hover:text-white rounded-r-xl transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>