<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
       <p>questo è il riepilogo degli oggetti sotto le 3 unità. Pregasi prestare attenzione (di seguito segnate in grassetto gli elementi a 0):</p>
       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       		<?php if($product["qty"] == 0): ?> 
       		<p><b><?php echo e($product["codice"]); ?> : totale <?php echo e($product["qty"]); ?> unità disponibili</b></p>
       		<?php else: ?>
       		<p><?php echo e($product["codice"]); ?> : totale <?php echo e($product["qty"]); ?> unità disponibili</p>
       		<?php endif; ?>
       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </body>
</html>