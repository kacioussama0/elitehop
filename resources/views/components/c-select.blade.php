<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <select name="{{ $name }}" id="{{ $name }}" class="form-select">
        <option value="" disabled selected>إختر</option>
        @foreach($options as $key => $val)
            <option @selected($val == $value) value="{{$val}}">{{$key}}</option>
        @endforeach
    </select>

    @error($name)
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
