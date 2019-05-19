<?php $__env->startSection("content"); ?>
	<div id="content" class="container">
		<?php echo $__env->make("components.bc",
		[
			"elem" => $nome
		], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="row">
                       <div class="box col-md-12">
			              <h1><?php echo e($nome); ?></h1>   
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
                  <h3 class="h4 card-title"><?php echo e($cat->nome); ?></h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                    <li>
                    	<?php $__currentLoopData = $allsubcat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allsub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    	   <ul class="list-unstyled">
                        <li><a href="/subcat/<?php echo e($allsub->id); ?>" class="nav-link"><?php echo e($allsub->nome); ?></a></li>
                      </ul>
                    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </li>
                  </ul>
                </div>
              </div>
          
         
              <!-- *** MENUS AND FILTERS END ***-->
          
            </div>


             <div class="col-lg-9 box">
		            <div class="row products">
		            	<?php $__currentLoopData = $elem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		            	 <div class="col-lg-4 col-md-6">
		                  <div class="product">
		                    <div class="text">
		                     <img src="/items/<?php echo e($e->img); ?>" class="img-responsive">
		                      <h3><a href="/detail/<?php echo e($e->id); ?>"><?php echo e($e->nome); ?></a></h3>
		                      <p class="price"> 
		                        <del></del><?php echo e($e->prezzo); ?> €
		                      </p>
		                      <p class="buttons"><a href="/detail/<?php echo e($e->id); ?>" class="btn btn-outline-secondary">Maggiori dettagli</a><a href="/cart/insert/<?php echo e($e->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a></p>
		                    </div>
		                    <!-- /.text-->
		                  </div>
		                  <!-- /.product            -->
		                </div>
		            	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		            
		            </div>


                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                  <?php echo e($elem->links()); ?>

                  </ul>
                </nav>

          </div>

          </div>

 
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>