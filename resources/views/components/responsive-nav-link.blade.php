@props(['active'])

<a {{ $attributes->merge(['class' => 'font-bold text-lg']) }}>
    {{ $slot }}
</a>
