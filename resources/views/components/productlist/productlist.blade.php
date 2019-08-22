<div class="container">

    <div class="row">

            <div class="col-md-12">

               <div class="row productsContainer">
                  @foreach($products as $product)
                   <div class="col-lg-4 col-md-6">
                      <div class="product">
                        <div class="text">
                         <img src="http://ecommerce2.sabaservice.com/paint/{{$product->img}}" class="img-responsive" />
                         <div class="product-detail-price">
                          <h3><a href="/detail/{{$product->id }}">{{ $product->name }}</a></h3>
                          </div>
                          <p class="price"> 
                            <del></del>
                            {{ number_format((float) $product->price, 2, ',', '.')  }} €
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

            

            </div>
                  

        </div>

</div>