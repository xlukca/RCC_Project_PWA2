{{ Form::label( $tag, __(strtoupper(str_replace('_', ' ', $tag))) ) }}
@if($errors->has($tag))
@error($tag)
{{ Form::date($tag, $$space[$tag] ?? null, ['class' => 'form-control is-invalid']) }}
  
@enderror
@else
{{ Form::date($tag, $$space[$tag] ?? null, ['class' => 'form-control mb-3']) }}
@endif

