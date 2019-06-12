<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span class="badge badge-<?php echo e($key); ?>"><?php echo e($value); ?></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>