@extends("templates.master")

@section("content")
		<div id="content" class="container">

				<div id="productMain" class="row">

						<div class="col-md-4">
								<img src="http://ecommerce2.sabaservice.com/paint/{{ $elem->img }}" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1 class="details--title">{{ $elem->name }}</h1>
			                    <!--<p class="goToDescription">Peso: {{ $elem->peso }} kg</p>-->
			                    <p class="price">{{ $elem->price }} €</p>

			                    @include("components.badge",[
			                    	"badge" => $elem->av == 1 ? "green" : "red",
			                    	"text" => $elem->av == 1 ? "disponibile" : "non disponibile"
			                    	])
			                    
			                   		 <p class="text-center buttons"><a href="/cart/insert/{{$elem->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a>
			                    	</p>

			                  </div>
						</div>
				</div>

		</div>

	
@endsection