@extends("templates.master")


@section("content")
<div class="container">
          <div class="row">
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ url()->current() }}/create">
                	@csrf
                  <h1>Checkout - Metodo di spiegazione</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Indirizzo</a><a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-truck">                       </i>Metodo di Spedizione</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Metodo Pagamento</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Riepilogo ordine</a></div>
                  <br/>
                   <div class="col-md-12">
                         @include('components.errors')



                          @include('components.success')

                   </div>
                  <div class="content py-3">
                    <div class="row">
                     @foreach( $shipping as $ship)
                         <div class="col-md-6">
                        <div class="box shipping-method">
                          <h4>{{ $ship->nome }}</h4>
                          <p>{{ $ship->descrizione }}</p>
                          <div class="box-footer text-center">
                            <input type="radio" name="shipping" value="{{ $ship->id }}">
                          </div>
                        </div>
                      </div>
                     @endforeach
                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="checkout1.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Torna all'indirizzo di spedizione</a>
                    <button type="submit" class="btn btn-primary">Vai al metodo di pagamento<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-md-9-->
            	@include("components.totale")
            <!-- /.col-md-3-->
          </div>
        </div>
@endsection