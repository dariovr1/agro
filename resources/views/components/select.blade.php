<div class="form-group
@isset($required)
	{{$required}}
@endisset
">
	<label for="{{$name}}">{{$name}}</label>
	<select id="{{ $name }}" class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"  name="{{$name}}">
		<option></option>
		@foreach($elems as $elem)
			<option value="{{$elem[$id]}}">{{$elem[$field]}}</option>
		@endforeach
	</select>
</div>