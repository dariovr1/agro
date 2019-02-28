@extends("templates.master")


@section("content")

	<div class="container">

		<div class="row">

		  <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="{{ url()->current() }}/create">
                  @csrf
                  <h1>Checkout - Inserisci indirizzo</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Indirizzo</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Metodo di Spedizione</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Metodo di Pagamento</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Riepilogo ordine</a></div>
                  <div class="content py-3">
                    <div class="row">

                      <div class="col-md-12">
                         @include('components.errors')



                          @include('components.success')

                        </div>

                      <div class="col-md-6">


                             @include('components.input',[
                                "elem" => "nome",
                                "required" => "required"
                              ])
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                           @include('components.input',[
                                "elem" => "cognome",
                                "required" => "required"
                              ])
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                              @include('components.input',[
                                "elem" => "azienda",
                                "required" => "required"
                              ])
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                             @include('components.input',[
                                "elem" => "via",
                                "required" => "required"
                              ])
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                           @include('components.input',[
                                "elem" => "presso"
                                ])
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          @include('components.input',[
                                "elem" => "cap",
                                "required" => "required"
                              ])
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                           @include('components.select',[
                              "name" => "comune",
                              "elems" => App\Citie::orderBy('comune')->get(),
                              "id" => "id",
                              "field" => "comune",
                              "required" => "required"
                            ])
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                       @include('components.select',[
                            "name" => "provincia",
                            "elems" => App\Prov::orderBy('provincia')->get(),
                            "id" => "id",
                            "field" => "provincia",
                            "required" => "required"
                          ])
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         @include('components.input',[
                                "elem" => "telefono"
                              ])
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         @include('components.input',[
                                "elem" => "email"
                              ])
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="basket.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Vai al carrello</a>
                    <button type="submit" class="btn btn-primary">Continua con il metodo di spedizione<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
   		 </div>

       @include("components.totale")


		</div>

	</div>

	

@endsection