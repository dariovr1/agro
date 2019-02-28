@extends("templates.master")


@section("content")

  <meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="container">

		<div class="row">

		  <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ url()->current() }}/create">
                  @csrf
                  <h1>Riepilogo Ordine</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Indirizzo</a><a href="#" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-truck">                       </i>Metodo di Spedizione</a><a href="#" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-money">                      </i>Metodo di Pagamento</a><a href="#" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-eye">                     </i>Riepilogo ordine</a></div>
                  <div class="content py-3">
                      <p><b>metodo di spedizione scelto:</b> {{ $shipping->nome }}</p>
                      <p><b>metodo di pagamento scelto:</b>  {{ $pay->nome }}</p>

                      <p><b>metodo di spedizione scelto:</b></p>
                      <ul>
                      @foreach (Session::get("address")[0] as $key => $value)
                          @if( $key == 'citie_id' )
                            <li><b>comune:</b> {{ getComune($value) }}</li>
                          @elseif( $key == 'prov_id' )
                             <li><b>provincia:</b> {{ getProv($value) }}</li>
                          @else
                             <li><b>{{ $key }}:</b> {{$value}}</li>
                          @endif
                      @endforeach
                    </ul>

                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Torna al metodo di pagamento</a>
                   <!--<div id="paypal-button"></div> -->
                   <a href="{{ url()->current() }}/create"><button class="btn btn-primary">Inserisci Ordine<i class="fa fa-chevron-right"></i></button></a>
                      <script src="https://www.paypalobjects.com/api/checkout.js"></script>
                      <script>
                        paypal.Button.render({
                          // Configure environment
                          env: 'sandbox',
                          client: {
                            sandbox: 'AWBrXoaJKAFJPQDLNvlotaespBK38WaIdSldnw7LmY4AOe1NEqAT09umSlcZE8gG-qB2zbjzhj_UBk62',
                            production: 'demo_production_client_id'
                          },
                          // Customize button (optional)
                          locale: 'it_IT',
                          style: {
                            size: 'small',
                            color: 'gold',
                            shape: 'pill',
                          },

                          // Enable Pay Now checkout flow (optional)
                          commit: true,

                           // Set up a payment
                            payment: function(data, actions) {
                              return actions.payment.create({
                                transactions: [{
                                  amount: {
                                    total: '20.60',
                                    currency: 'EUR'
                                  }
                                }]
                              });
                            },
                            // Execute the payment
                            onAuthorize: function(data, actions) {
                              return actions.payment.execute().then(function(res) {
                                // Show a confirmation message to the buyer
                                console.log(res);
                                window.alert('Thank you for your purchase!');
                              });
                            }
                          }, '#paypal-button');

                      </script>
                  </div>
                </form>
              </div>
              <!-- /.box-->
   		 </div>

       @include("components.totale")


		</div>

	</div>

	

@endsection