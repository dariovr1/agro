<div class="form-group
@isset($required)
	{{$required}}
@endisset
">
                 <label for="{{$elem}}" class="text-uppercase">
                    {{$elem}}
                  </label>
                  <input id="{{$elem}}" type="text" class="form-control {{ $errors->has($elem) ? ' is-invalid' : '' }}" name="{{$elem}}" value="{{ old($elem) }}" />
    </div>