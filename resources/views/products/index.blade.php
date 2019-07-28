@extends("templates.master")

@section("content")
  
  <div class="container">

    <div class="row">


            <div class="col-md-12">

               <div class="row productsContainer">
                  @foreach($products as $product)
                   <div class="col-lg-4 col-md-6">
                      <div class="product">
                        <div class="text">
                         <img src="http://ecommerce2.sabaservice.com/paint/{{$product->img}}" class="img-responsive" />
                          <h3><a href="/detail/{{$product->id }}">{{ $product->name }}</a></h3>
                          <p class="price"> 
                            <del></del>{{ $product->price }} €
                          </p>
                        <p class="buttons"><a href="/detail/{{ $product->id }}" class="btn btn-outline-secondary">Maggiori dettagli</a><a href="/cart/insert/{{
                            $product->id
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
                  {{ $products->links() }}
                  </ul>
                </nav>


            </div>
                  

        </div>

      </div>
       
@endsection