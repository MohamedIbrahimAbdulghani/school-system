<picture>
    <source srcset="{{ asset('assets/images/logo-icon-light.jpg') }}" media="(prefers-color-scheme: dark)">
    <img src="{{ asset('assets/images/logo-icon-dark.jpg') }}" alt="Logo" {{ $attributes->merge(['class' => 'rounded-full shadow-sm']) }}>
</picture>
