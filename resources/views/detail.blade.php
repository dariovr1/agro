@extends("templates.master")

@section("content")
		<div id="content" class="container">

				<div id="productMain" class="row">
						<div class="col-md-4">
								<img src="/items/{{ $elem->codice }}.jpg" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1>{{ $elem->nome }}</h1>
			                    <p class="goToDescription"><a href="#details" class="scroll-to">Peso: {{ $elem->peso }} kg</a></p>
			                    <p class="price">{{ $elem->prezzo }} €</p>
			                    <p class="text-center buttons"><a href="/cart/insert/{{$elem->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a></p>
			                  </div>
						</div>
				</div>

					
						<div id="details" class="box">
		              	  <h4>Dettaglio prodotto</h4>
		              	  <ul>
		              	  		@foreach($info as $key => $value)
		              	  			@if($key == "dati" || $key == "peso")
		              	  			  @continue
		              	  			@endif
		              	  			<li><b>{{$key}}:</b>{{$value}}</li>
		              	  		@endforeach
		              	  </ul>
		              	  @isset($info->dati)
		              	  {{$info->dati}}
		              	  @endisset
		              </div>

		</div>

	
@endsection