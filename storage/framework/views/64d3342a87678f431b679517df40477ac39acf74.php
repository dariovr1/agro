<?php $__env->startSection("content"); ?>

		<?php echo $__env->make("components.productlist.productlist",[
				"products" => $products
			], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>