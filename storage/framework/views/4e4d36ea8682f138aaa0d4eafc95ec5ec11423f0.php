<?php $__env->startSection("content"); ?>
	<div class="container">

		<?php echo $__env->make("components.dash", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

	</div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>