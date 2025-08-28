@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-sans font-medium text-base text-green-600']) }}>
        {{ $status }}
    </div>
@endif
