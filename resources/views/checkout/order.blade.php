@extends("templates.success.master")


@section("content")

  <div id="checkout" class="col-md-9 reviewOrderAfterPay">
              <div class="box">
                  <h1>Riepilogo Ordine</h1>
                  <div class="content py-3">
                    
                      <ul class="list-group">
                      @foreach ($address as $key => $value)
                        @if ($value != "")
                         <li class="list-group-item"><b>{{$key}}:</b> {{$value}}</li>
                         @endif
                      @endforeach
                    </ul>
                    <br/>
                     <h3>Metodo di Spedizione</h3>
                       <p><b>Metodo di spedizione scelto:</b> {{$shipping["shipping"]}}</p>
                       <br/>
                      <h3>Metodo di Pagamento</h3>
                       <p><b>Metodo di pagamento scelto:</b> {{$payment["payment"]}}</p>
                       <h3>Prodotti scelti:</h3>
                     <table class="table">
                        <thead>
                          <tr>
                            <th>Prodotto</th>
                            <th>Prezzo</th>
                            <th>Quantità</th>
                          </tr>
                        </thead>
                        <tbody>
                       @foreach ($items as $item)
                         <tr>
                          <td>{{$item->name}}</td>
                           <td>{{$item->price}}</td>
                          <td>{{$item->qty}}</td>
                        </tr>
                       @endforeach
                       <tr>
                          <td><b>Subtotale</b></td>
                          <td><b>{{$subtotal}}</b></td>
                          <td></td>
                       </tr>
                    </tbody>
                  </table>

                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Torna al metodo di pagamento</a>
                   <!--<div id="paypal-button"></div> -->
                   <a href="/paywithpaypal"><button class="btn btn-primary">Paga con Paypal<i class="fa fa-chevron-right"></i></button></a>
                  </div>
              </div>
              <!-- /.box-->
       </div>

@endsection