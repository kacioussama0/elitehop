<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if($type == 'textarea')
        <textarea name="{{$name}}" id="{{$name}}" class="form-control" @disabled($disabled)>{{ old($name, $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" class="form-control"  @disabled($disabled) value="{{ old($name, $value) }}">
    @endif
    @error($name)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
