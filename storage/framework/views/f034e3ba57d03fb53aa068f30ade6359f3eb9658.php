<div class="form-group
<?php if(isset($required)): ?>
	<?php echo e($required); ?>

<?php endif; ?>
">
                 <label for="<?php echo e($elem); ?>" class="text-uppercase">
                    <?php echo e($elem); ?>

                  </label>
                  <input id="<?php echo e($elem); ?>" type="text" class="form-control <?php echo e($errors->has($elem) ? ' is-invalid' : ''); ?>" name="<?php echo e($elem); ?>" value="<?php echo e(old($elem)); ?>" />
    </div>