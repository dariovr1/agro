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
                   @foreach( App\Categorie::all() as $categories )
                   <li><a href="category.html" class="nav-link">{{ $categories->nome }}</a>
                    <?php $subcats = App\Categorie::find($categories->id)->subcategories; ?>
                      <ul class="">
                        @foreach( $subcats as $subcat )
                            @if(!empty($subcat)) 
                            <li><a href="/index/sc/{{ $subcat->id }}" class="nav-link">{{ $subcat->nome }}</a></li>
                            @endif
                        @endforeach
                      </ul>
                   </li>

                   @endforeach
                  </ul>
                </div>
              </div>
    
              <!-- *** MENUS AND FILTERS END ***-->
</div>

<!--
 <li><a href="category.html" class="nav-link">Men <span class="badge badge-secondary">42</span></a>
                      <ul class="list-unstyled">
                        <li><a href="category.html" class="nav-link">T-shirts</a></li>
                        <li><a href="category.html" class="nav-link">Shirts</a></li>
                        <li><a href="category.html" class="nav-link">Pants</a></li>
                        <li><a href="category.html" class="nav-link">Accessories</a></li>
                      </ul>
                    </li>
                    -->