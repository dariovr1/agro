@extends("templates.master")

@section("content")
	<div id="content" class="container">
		@include("components.bc",
		[
			"elem" => $nome
		])

                <div class="row">
                       <div class="box col-md-12">
			              <h1>{{$nome}}</h1>   
			            </div>
                </div>

          <div class="row">

          	<div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">{{ $cat->nome }}</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    <li>
                    	@foreach($allsubcat as $allsub)
                    	   <ul class="list-unstyled">
                        <li><a href="/subcat/{{$allsub->id}}" class="nav-link">{{$allsub->nome}}</a></li>
                      </ul>
                    	@endforeach
                    </li>
                  </ul>
                </div>
              </div>
          
         
              <!-- *** MENUS AND FILTERS END ***-->
          
            </div>


             <div class="col-lg-9 box">
		            <div class="row products">
		            	@foreach($elem as $e)
		            	 <div class="col-lg-4 col-md-6">
		                  <div class="product">
		                    <div class="text">
		                     <img src="/items/{{ $e->codice }}.JPG" class="img-responsive">
		                      <h3><a href="/detail/{{$e->id }}">{{ $e->nome }}</a></h3>
		                      <p class="price"> 
		                        <del></del>{{ $e->prezzo }} €
		                      </p>
		                      <p class="buttons"><a href="/detail/{{ $e->id }}" class="btn btn-outline-secondary">Maggiori dettagli</a><a href="/cart/insert/{{
		                      	$e->id
		                      }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a></p>
		                    </div>
		                    <!-- /.text-->
		                  </div>
		                  <!-- /.product            -->
		                </div>
		            	@endforeach
		            
		            </div>


                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                  {{ $elem->links() }}
                  </ul>
                </nav>

          </div>

          </div>

 
	</div>
@endsection