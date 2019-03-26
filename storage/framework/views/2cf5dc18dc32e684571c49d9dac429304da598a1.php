

 <div id="slideshow" class="carousel slide" data-ride="carousel">
          <ul class="carousel-indicators">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li data-target="#slideshow" data-slide-to="<?php echo e($key); ?>" <?php if($key == 0): ?> class="active" <?php endif; ?>></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
          <div class="carousel-inner">
          <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="carousel-item <?php if($key == 0): ?> active <?php endif; ?>">
              <img src="/slide/<?php echo e($value["img"]); ?>" alt="" width="1100" height="400">
              <div class="carousel-caption">
                <h3><?php echo e($value["titolo"]); ?></h3>
                <p><?php echo e($value["descrizione"]); ?></p>
              </div>   
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
          <a class="carousel-control-prev" href="#slideshow" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>
          <a class="carousel-control-next" href="#slideshow" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
    </div>