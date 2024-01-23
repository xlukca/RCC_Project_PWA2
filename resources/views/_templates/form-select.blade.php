{{ Form::label( $tag, __(strtoupper(str_replace('_', ' ', $tag))) ) }}
<br>
@if($errors->has($tag))
@error($tag)
{{ Form::select(
    $tag, 
    [null => 'Please select'] + ($list ??  ['0' => '0']),
    $$space[$tag] ?? null, 
    ['class' => 'form-select is-invalid']
) }}
<div class="invalid-feedback">
    {{ $message }}
</div>  
@enderror
@else
{{ Form::select(
    $tag, 
    [null => 'Please select'] + ($list ??  ['0' => '0']),
    $$space[$tag] ?? null, 
    ['class' => 'form-select mb-3']
) }}
<br>
@endif