<?php $__env->startSection("content"); ?>
		<div id="content" class="container">

				<div id="productMain" class="row">

						<div class="col-md-4">
								<img src="/items/<?php echo e($elem->codice.'.'.$elem->ext); ?>" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1 class="details--title"><?php echo e($elem->nome); ?></h1>
			                    <p class="goToDescription">Peso: <?php echo e($elem->peso); ?> kg</p>
			                    <p class="price"><?php echo e($elem->prezzo); ?> €</p>
			                    
			                    <?php if(!array_key_exists('danger', $status)): ?>
			                   		 <p class="text-center buttons"><a href="/cart/insert/<?php echo e($elem->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a>
			                    	</p>
			                    <?php endif; ?>

			                    <?php echo $__env->make("components.badge",[
			                    		"data" => $status
			                    	], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

			                  </div>
						</div>
				</div>

					
						<div id="details" class="box">
		              	  <h4>Dettaglio prodotto</h4>
		              	  <ul>
		              	  	<?php if($info !== 0 && $info !== NULL && $info !== ""): ?>
		              	  		<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              	  			<li><b><?php echo e($key); ?>:</b><?php echo e($value); ?></li>
		              	  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		              	  	<?php endif; ?>
		              	  </ul>
		              	  <?php if(isset($info->dati)): ?>
		              	  <?php echo e($info->dati); ?>

		              	  <?php endif; ?>
		              </div>

		</div>

	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>