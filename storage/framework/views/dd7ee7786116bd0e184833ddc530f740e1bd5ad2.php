<?php $__env->startSection("content"); ?>
		<div id="content" class="container">

				<div id="productMain" class="row">

						<div class="col-md-4">
								<img src="http://ecommerce2.sabaservice.com/paint/<?php echo e($elem->img); ?>" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1 class="details--title"><?php echo e($elem->name); ?></h1>
			                    <!--<p class="goToDescription">Peso: <?php echo e($elem->peso); ?> kg</p>-->
			                    <p class="price"><?php echo e($elem->price); ?> €</p>

			                    <?php echo $__env->make("components.badge",$av, \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			                    
			                   		 <p class="text-center buttons"><a href="/cart/insert/<?php echo e($elem->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a>
			                    	</p>

			                   <span class="badge"></span>

			                  </div>
						</div>
				</div>

		</div>

	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>