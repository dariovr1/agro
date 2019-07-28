<div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Categorie</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                   @foreach( $types as $type )
                   <li><a href="/category/{{ $type->id }}" class="nav-link">{{ $type->name }}</a>
                      <ul class="">
                        @foreach( App\Models\Type::find($type->id)->productcategories as $prodcat )
                            <li><a href="/index/sc/{{ $prodcat->id }}" class="nav-link">{{ $prodcat->name }}</a></li>
                        @endforeach
                      </ul>
                   </li>

                   @endforeach
                  </ul>
                </div>
              </div>
    
              <!-- *** MENUS AND FILTERS END ***-->
</div>
