<?php $__env->startSection("content"); ?>
		<div id="content" class="container">

				<div id="productMain" class="row">
						<div class="col-md-4">
								<img src="/items/<?php echo e($elem->codice); ?>.jpg" class="img-responsive" />
						</div>

						<div class="col-md-8">
							 <div class="box">
			                    <h1><?php echo e($elem->nome); ?></h1>
			                    <p class="goToDescription"><a href="#details" class="scroll-to">Peso: <?php echo e($elem->peso); ?> kg</a></p>
			                    <p class="price"><?php echo e($elem->prezzo); ?> €</p>
			                    <p class="text-center buttons"><a href="/cart/insert/<?php echo e($elem->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Aggiungi al carrello</a></p>
			                  </div>
						</div>
				</div>

					
						<div id="details" class="box">
		              	  <h4>Dettaglio prodotto</h4>
		              	  <ul>
		              	  		<?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		              	  			<?php if($key == "dati" || $key == "peso"): ?>
		              	  			  <?php continue; ?>
		              	  			<?php endif; ?>
		              	  			<li><b><?php echo e($key); ?>:</b><?php echo e($value); ?></li>
		              	  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		              	  </ul>
		              	  <?php if(isset($info->dati)): ?>
		              	  <?php echo e($info->dati); ?>

		              	  <?php endif; ?>
		              </div>

		</div>

	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>