@extends("templates.master")

@section("content")
<section class="login-block">
    <div class="container">
      <div class="box">
             <div class="row">
            <div class="col-md-6 login-sec">
              <h2 class="text-center">Registrati</h2>
                 <form method="POST" action="{{ route('register') }}">
                        @csrf


                          @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif

                        <div class="form-group">
                            <label for="name" class="col-form-label text-md-right">{{ __('Nome') }}</label>

                          
                        <input id="nome" type="text" class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" name="nome" value="{{ old('nome') }}" required autofocus>    
                        </div>

                         <div class="form-group">
                            <label for="cognome" class="col-form-label text-md-right">{{ __('Cognome') }}</label>

                          
                        <input id="cognome" type="text" class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}" name="cognome" value="{{ old('cognome') }}" required autofocus>    
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">{{ __('Indirizzo E-mail') }}</label>

                        
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password" class="">{{ __('Password') }}
                            </label>

                          
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Conferma Password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                       
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrati') }}
                                </button>
                    </form>

            </div>
        <div class="col-md-8 banner-sec">
  
    </div>
</div>
      </div>
</section>
@endsection