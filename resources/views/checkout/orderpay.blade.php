@extends("templates.master")


@section("content")

  <meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="container">

		<div class="row">

		  <div id="checkout" class="col-lg-9">
              <div class="box">

                <div role="alert" class="fade alert alert-success show">
                  ordine registrato con successo. E' possibile pagare ora.
                </div>

                <div id="paypal-button"></div>

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
                                    total: '{{ totalCart() + trasporto() }}',
                                    currency: 'EUR'
                                  }
                                }]
                              });
                            },
                            // Execute the payment
                            onAuthorize: function(data, actions) {
                              return actions.payment.execute().then(function(res) {
                                // Show a confirmation message to the buyer

                                window.location.href = 'reviewOrderPay/success';
                                
                              });
                            }
                          }, '#paypal-button');

                      </script>

              </div>
              <!-- /.box-->
   		 </div>

       @include("components.totale")


		</div>

	</div>

	

@endsection