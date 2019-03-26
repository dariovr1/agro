@extends("templates.sign.master")

@section("title","Area registrazione Agroambiente")

@section("content")
     <div class="card-body">
         <h2 class="title">Login</h2>


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
                                <input class="form-check-input" style="    left: -247px;
    top: 0px;" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Ricordami') }}
                                </label>
                         </div>

                         <br/>


                          <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                             @if (Route::has('password.request'))
                                <a class="btn btn-link" style="color:#40d427;" href="user/password-reset">
                                    {{ __('Password Dimenticata?') }}
                                </a>
                            @endif


                  </form>
                 
      </div>
@endsection

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
