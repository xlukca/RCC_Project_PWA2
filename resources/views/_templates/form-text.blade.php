{{-- {{ Form::label( $tag, __(strtoupper(str_replace('_', ' ', $tag))) ) }}
@if($errors->has($tag))
@error($tag)
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control is-invalid']) }}
<div class="invalid-feedback mb-3">
    {{ $message }}
</div>  
@enderror
@else
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control mb-3']) }}
@endif --}}

{{ Form::label($tag, __(strtoupper(str_replace('_', ' ', $tag)))) }}
@if($errors->has($tag))
@error($tag)
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control is-invalid', 'placeholder' => $placeholder ?? null]) }}
<div class="invalid-feedback mb-3">
    {{ $message }}
</div>  
@enderror
@else
{{ Form::text($tag, $$space[$tag] ?? null, ['class' => 'form-control mb-3', 'placeholder' => $placeholder ?? null]) }}
@endif