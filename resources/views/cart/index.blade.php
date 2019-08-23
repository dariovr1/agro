@extends("templates.master")

@section("content")
<div id="content">
        <div class="container">
          <div class="row">
            <div id="basket" class="col-lg-9">
              <div class="box">
			 		 @if( $count > 0)
			 		 @include("components.success")
			 		 <h1>Riepilogo Carrello</h1>
                  	 <br/>
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
		                                <img class="img-responsive" src="{{$cart->options->imgurl}}" />
		                          	</a>
	                      	  </td>
	                          <td><a href="#">{{ $cart->name }}</a></td>
	                          <td>
	                          	<form name="update{{ $cart->rowId }}" method="POST" action="/cart/update">
	                          		@method("PATCH")
	                          		@csrf
	                          		<input type="hidden" name="rowId" value="{{$cart->rowId}}" />
	                          	<input type="number" name="qty" value="{{ $cart->qty }}" class="form-control numberCheckOut" onclick="return document.forms.update{{ $cart->rowId }}.submit();" />
	                          	</form>
	                          </td>
	                          <td></td>
	                          <td> {{ number_format((float)$cart->price * $cart->qty, 2, ',', '.')  }} €</td>
	                          <td>
	                          	<form name="delete{{ $cart->rowId }}" method="POST" action="/cart/destroy/{{ $cart->rowId }}">
					  						@method("DELETE")
										    @csrf
	                          	<a href="#" onclick="return document.forms.delete{{ $cart->rowId }}.submit();"><i class="fa fa-trash-o"></i></a>
	                          		</form>	
	                          </td>
                       	   </tr>
					  		@endforeach
					  		</tbody>
					  		<tfoot>
                        <tr>
                          <th colspan="4">Subtotale prodotti</th>
                          <th colspan="2">{{ $subtotale }}  €</th>
                        </tr>
                      </tfoot>
				  		</table>
                  </div>
                  @endif
                   @if( $count == 0 )
                  	<p>il carrello è vuoto. Inserisci un prodotto per continuare gli acquisti.</p>
                  @endif
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="/" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continua gli acquisti</a></div>
                    <div class="right">
                      <a href="/cart/checkout">
                   	   <button type="submit" class="btn btn-primary">Procedi con l'ordine<i class="fa fa-chevron-right"></i></button>
                   	  </a>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            @if($count > 0)
           		 @include("components.checkout.totale")
            @endif
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
@endsection 