<div class="col-lg-9">

            @if (!empty($elem))
              <div class="box">
                <h1>{{ $elem->nome }}</h1>
              </div>

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

            @endif

             @if (empty($elem))

               <div class="box">
                <h1>Gent.le utente, Benvenuto su Agroambiente s.r.l</h1>
              </div>

              <div class="box">
                  <p>utilizza la barra di sinistra per navigare all'interno delle categorie, oppure naviga nelle sezioni all'interno della voce di menu "i miei prodotti" </p>
              </div>

             @endif
</div>