@extends("templates.master")

@section("content")

<section class="login-block">
	<div class="row">
    <div class="container">
      <div class="col-lg-6">
                <div class="box">
                  <h1>Login</h1>
                  <hr>
                  @if(session("warning") != "")
                  <div class="alert alert-warning" role="alert">
                   {{ session("warning") }}
                  </div>
                  @endif


                   <h2 class="text-center">Connettiti</h2>
                    <form method="POST" action="{{ route('login') }}" class="login-form">
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
                          <label for="email" class="text-uppercase">
                            {{ __('Indirizzo E-mail') }}
                          </label>
                          <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus />
                          
                        </div>
                        <div class="form-group">
                           <label for="password" class="text-uppercase">{{ __('Password') }}</label>
                           <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required />
                        </div>
                        
                        
                          <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Ricordami') }}
                                </label>
                         </div>

                         <br/>


                          <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                             @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Password Dimenticata?') }}
                                </a>
                            @endif


                  </form>
               
                </div>
    </div>
    <div class="col-lg-6">
    </div>
  </div>
   </div>
</section>
@endsection