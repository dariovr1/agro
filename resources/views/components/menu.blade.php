<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="/img/logo.jpg" /></a>
  </div>
  
  <div class="collapse navbar-collapse js-navbar-collapse">
     @if(!empty($cat)) 
    <ul class="nav navbar-nav">
      <li class="dropdown mega-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogo Prodotti <span class="caret"></span></a>        
        <ul class="dropdown-menu mega-dropdown-menu">
          @foreach($cat as $cats)
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header">{{$cats->nome}}</li>
                  <?php $subcat = App\Categorie::find($cats->id)->subcategories;
                   ?>
                   @foreach($subcat as $subcats)
                       <li><a href="<?php echo url("/{$subcats->nome}"); ?>">{{$subcats->nome}}</a></li>
                   @endforeach
              </ul>
            </li>
          @endforeach
        </ul>       
      </li>
    </ul>
     @endif 
        <ul class="nav navbar-nav navbar-right">
          @if (Auth::check())
            <li><a href="#">Benvenuto {{ Auth::user()->name }}</a>
            <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit">Logout</button>
            </form>
            </li>
          @else
            <li id="login-registrati"><a href="/login">Login</a>
            <a href="/register">Registrati</a></li>
          @endif
        <li><a href="/cart">My cart (0) items</a></li>
      </ul>
  </div><!-- /.nav-collapse -->
  </nav>