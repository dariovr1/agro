 <?php
 $category = App\Categorie::all() 
 ?>
 <header class="header">
      <!--
      *** TOPBAR ***
      _________________________________________________________
      -->
      <div id="top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6 text-center text-lg-right">
              <?php if(Auth::check()): ?>
              <ul class="menu list-inline mb-0">
                <li class="list-inline-item">Benvenuto <?php echo e(Auth::user()->nome); ?> <?php echo e(Auth::user()->cognome); ?></li>
                <li class="list-inline-item"><a href="/profile">Vai al tuo priflo</a></li>
              </ul>
              <?php else: ?>
                   <ul class="menu list-inline mb-0">
                <li class="list-inline-item"><a href="/login">Login</a></li>
                <li class="list-inline-item"><a href="/register">Registrati</a></li>
                <li class="list-inline-item"><a href="/pag/contatti">Contattaci</a></li>
              </ul>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <!-- *** TOP BAR END ***-->
        
        
      </div>
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a href="/" class="navbar-brand home"><img src="/img/logo.jpg" alt="Agroambiente" class="d-none d-md-inline-block"><img src="img/logo.jpg" alt="Agroambiente" class="d-inline-block d-md-none"><span class="sr-only">Agroambiente - vai alla homepage</span></a>
          <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search" class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></button><a href="/cart" class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i></a>
          </div>
          <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a href="/" class="nav-link active">Home</a></li>
              <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown" data-delay="200" class="dropdown-toggle nav-link">I nostri prodotti<b class="caret"></b></a>
                <ul class="dropdown-menu megamenu">
                  <li>
                    <div class="row">
                      <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="col-md-6 col-lg-3">
                            <a href="/category/<?php echo e($cat->id); ?>"><h5><?php echo e($cat->nome); ?></h5></a>
                             <ul class="list-unstyled mb-3">
                                <?php $subcat = App\Categorie::find($cat->id)->subcategories; ?>
                                     <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li class="nav-item"><a href="/subcat/<?php echo e($subcats->id); ?>" class="nav-link"><?php echo e($subcats->nome); ?></a></li>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                          </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </li>
                </ul>
              </li>
                <li class="nav-item"><a href="/pag/chi-siamo" class="nav-link">Chi Siamo</a></li>
               <li class="nav-item"><a href="/pag/contatti" class="nav-link">Contatti</a></li>
            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
              <!-- /.nav-collapse-->
              <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse" href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
              <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="<?php echo e(url("/cart")); ?>" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span>Vai al carrello</span></a></div>
            </div>
          </div>
        </div>
      </nav>
      <div id="search" class="collapse">
        <div class="container">
          <form role="search" class="ml-auto">
            <div class="input-group">
              <input type="text" placeholder="Search" class="form-control">
              <div class="input-group-append">
                <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </header>
