<?php $__env->startSection("content"); ?>
	<div class="container">
		<div class="box">
			<h1><?php echo e($name); ?></h1>
			<div class="row">
	                <?php $__currentLoopData = $productcategorie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                <div class="col-md-4">
	                  <div class="product--categories">
	                    <div class="text">
	                    	<br/>
	                      <img src="http://ecommerce2.sabaservice.com/images/home_page/classi/<?php echo e($prodcat->img); ?>" class="img-responsive" />
	                      <h3 style="text-align: center;"><a href="/subcat/<?php echo e($prodcat->id); ?>"><?php echo e($prodcat->name); ?></a></h3>
	                    </div>
	                    <!-- /.text-->
	                  </div>
	                  <!-- /.product            -->
	                </div>
	                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	        </div>
       </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>