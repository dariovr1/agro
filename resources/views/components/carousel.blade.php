<div class="container">
	  		<h2 class="title">Ultimi Arrivi</h2>
  <div id="demos" class="owl-carousel">
  		@foreach($carousel as $caro)
  			<div class="item">
  				<img src="/img/{{$caro->codice}}.jpg" class="img-responsive" width="50%" />
  				<h3>{{$caro->nome}}</h3>
          <a href="/categorie/{{$caro->id}}">{{ getCat($caro->id) }}</a>
          <div class="avl {{ 
            fromJson($caro->id,'orderinfo','availabilityText') == 'fornibile da subito' ? 'green' : 'red'  
          }}">
              <span>{{ fromJson($caro->id,'orderinfo','availabilityText') }}</span>
          </div>
          <span class="price"><b>{{ fromJson($caro->id,'orderinfo','grossPrice') }}</b></span>

          <a href="/cart/insert/{{ $caro->id }}">Aggiungi al carrello</a>
  			</div>
  		@endforeach
  </div>
</div>