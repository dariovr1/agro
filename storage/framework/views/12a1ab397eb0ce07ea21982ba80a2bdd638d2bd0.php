<nav class="navbar navbar-inverse">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#"><img src="/img/logo.jpg" /></a>
  </div>
  
  <div class="collapse navbar-collapse js-navbar-collapse">
     <?php if(!empty($cat)): ?> 
    <ul class="nav navbar-nav">
      <li class="dropdown mega-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalogo Prodotti <span class="caret"></span></a>        
        <ul class="dropdown-menu mega-dropdown-menu">
          <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-sm-3">
              <ul>
                <li class="dropdown-header"><?php echo e($cats->nome); ?></li>
                  <?php $subcat = App\Categorie::find($cats->id)->subcategories;
                   ?>
                   <?php $__currentLoopData = $subcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcats): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <li><a href="<?php echo url("/{$subcats->nome}"); ?>"><?php echo e($subcats->nome); ?></a></li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
            </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>       
      </li>
    </ul>
     <?php endif; ?> 
        <ul class="nav navbar-nav navbar-right">
          <?php if(Auth::check()): ?>
            <li><a href="#">Benvenuto <?php echo e(Auth::user()->name); ?></a>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <button type="submit">Logout</button>
            </form>
            </li>
          <?php else: ?>
            <li id="login-registrati"><a href="/login">Login</a>
            <a href="/register">Registrati</a></li>
          <?php endif; ?>
        <li><a href="/cart">My cart (0) items</a></li>
      </ul>
  </div><!-- /.nav-collapse -->
  </nav>