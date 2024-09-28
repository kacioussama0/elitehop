<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if($type == 'textarea')
        <textarea name="{{$name}}" id="{{$name}}" class="form-control">{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control" value="{{ old($name, $value) }}">
    @endif
    @error($name)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
