<div class="form-group
<?php if(isset($required)): ?>
	<?php echo e($required); ?>

<?php endif; ?>
">
	<label for="<?php echo e($name); ?>"><?php echo e($name); ?></label>
	<select id="<?php echo e($name); ?>" class="form-control <?php echo e($errors->has($name) ? ' is-invalid' : ''); ?>"  name="<?php echo e($name); ?>">
		<option></option>
		<?php $__currentLoopData = $elems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<option value="<?php echo e($elem[$id]); ?>"><?php echo e($elem[$field]); ?></option>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</select>
</div>