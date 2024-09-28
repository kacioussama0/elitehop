@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-primary']) }}>
        {{ $status }}
    </div>
@endif
