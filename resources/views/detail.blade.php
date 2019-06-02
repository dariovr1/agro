@extends("templates.master")

@section("content")
		<div id="content" class="container">

			<div class="statusBar {{ $detail["availabilityCode"] }}">
				<p>{{$detail["availabilityText"]}}</p>
					</div>

				<div id="productMain" class="row">

						<div class="col-md-4">
								<img src="/items/{{ $elem->codice.'.'.$elem->ext }}" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1>{{ $elem->nome }}</h1>
			                    <p class="goToDescription"><a href="#details" class="scroll-to">Peso: {{ $elem->peso }} kg</a></p>
			                    <p class="price">{{ $elem->prezzo }} €</p>
			                    @if($detail["availabilityCode"] == "available")
			                    <p class="text-center buttons"><a href="/cart/insert/{{$elem->id}}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a></p>
			                    @endif
			                  </div>
						</div>
				</div>

					
						<div id="details" class="box">
		              	  <h4>Dettaglio prodotto</h4>
		              	  <ul>
		              	  	@if($info !== 0 && $info !== NULL && $info !== "")
		              	  		@foreach($info as $key => $value)
		              	  			@if($key == "dati" || $key == "peso")
		              	  			  @continue
		              	  			@endif
		              	  			<li><b>{{$key}}:</b>{{$value}}</li>
		              	  		@endforeach
		              	  	@endif
		              	  </ul>
		              	  @isset($info->dati)
		              	  {{$info->dati}}
		              	  @endisset
		              </div>

		</div>

	
@endsection