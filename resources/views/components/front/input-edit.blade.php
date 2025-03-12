@props([
'label' => null,
'type' => 'text',
'name',
'value' => null,
])

@if ($label)
<label for="">{{$label}}</label>
@endif
<input type="{{$type}}" 
    id="{{$name}}" 
    name="{{$name}}" 
    placeholder="{{$label}}"
    class="form-control @error($name) is-invalid @enderror"
    value="{{ old($name, $value) }}">
@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
