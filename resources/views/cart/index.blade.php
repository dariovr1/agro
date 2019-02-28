@extends("templates.master")

@section("content")
<div id="content">
        <div class="container">
          <div class="row">
            <div id="basket" class="col-lg-9">
              <div class="box">
                  <h1>Riepilogo Carrello</h1>
                  <br/>
                   @if(isset($carts))
			 		 @if(!$carts->isEmpty())
                  <div class="table-responsive">
				  		<table class="table">
				  			 <thead>
						      <tr>
						        <th colspan="2">Prodotto</th>
						        <th>Quantità</th>
						        <th></th>
						        <th colspan="2">Totale Parziale</th>
						      </tr>
						    </thead>
						    <tbody>

					  		@foreach($carts as $cart)

					  		<tr>
	                          <td>
		                          	<a href="#">
		                                <img class="img-responsive" src="/items/{{ $cart->product->codice}}.jpg" />
		                          	</a>
	                      	  </td>
	                          <td><a href="#">{{ $cart->product->nome }}</a></td>
	                          <td>
	                           		 <div class="cart-item-cell qty recurring-enabled">
										    <div class="js-plusminus plusminus">
										    	<form name="cart_less{{ $cart->id }}" method="POST" action="/cart/update/{{ $cart->id }}">
										    		@method("PATCH")
										    		@csrf
										    		<input type="hidden" name="qty" value="{{ ($cart->quantita - 1) <=0 ? 1 : $cart->quantita - 1 }}" />
										    		<a class="decrement-value js-decrement-value" href="#" rel="nofollow" onclick="return document.forms.cart_less{{ $cart->id }}.submit();"> − </a>
										    	</form>
										        <input type="number" name="qty" class="font-light js-plusminus-number" value="{{$cart->quantita}}" maxlength="2" min="1" max="99" data-base-value="3">
										        <form method="POST" name="cart_add{{ $cart->id }}" action="/cart/update/{{ $cart->id }}">
										        	@method("PATCH")
										        	@csrf
										        	<input type="hidden" name="qty" value="{{ ($cart->quantita + 1) }}" />
										        <a class="increment-value js-increment-value" href="#" rel="nofollow" onclick="return document.forms.cart_add{{ $cart->id }}.submit();"> + </a>
										    	</form>
										    </div>
	    								</div>
	                          </td>
	                          <td></td>
	                          <?php $value = str_replace (',', '.' ,$cart->product->prezzo);
	                           ?>
	                          <td>{{ floatval($value) * $cart->quantita  }} €</td>
	                          <td>
	                          	<form name="delete{{ $cart->id }}" method="POST" action="/cart/destroy/{{ $cart->id }}">
					  						@method("DELETE")
										    @csrf
	                          	<a href="#" onclick="return document.forms.delete{{ $cart->id }}.submit();"><i class="fa fa-trash-o"></i></a>
	                          		</form>	
	                          </td>
                       	   </tr>
					  		@endforeach
					  		</tbody>
					  		<tfoot>
                        <tr>
                          <th colspan="4">Totale</th>
                          <th colspan="2">{{ totalCart() }} €</th>
                        </tr>
                      </tfoot>
				  		</table>
                  </div>
                  <!-- /.table-responsive-->
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="category.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continua gli acquisti</a></div>
                    <div class="right">
                    	<form method="POST" action="/checkout">
                    		@csrf
                    		@foreach($carts as $cart)
                    				<input type="hidden" name="cartItem[]" value="{{$cart->id}}" />
                    		@endforeach
                   	   <button type="submit" class="btn btn-primary">Procedi con l'ordine<i class="fa fa-chevron-right"></i></button>
                  		</form>
                    </div>
                  </div>
                  	  @else
				  	<p>Il carrello è vuoto. Torna allo shop</p>
						@endif
						@else
						  @if (!Auth::check())
		  		<p>il tuo carrello non è visualizzabile. Per favore <a href="{{ url("/register") }}">registrati</a> o fai <a href="{{ url("/login") }}">login</a> per accedere al nostro e-commerce.</p>
		  @endif
					@endif
              </div>
            </div>
            <!-- /.col-lg-9-->
            @include("components.totale")
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
@endsection 