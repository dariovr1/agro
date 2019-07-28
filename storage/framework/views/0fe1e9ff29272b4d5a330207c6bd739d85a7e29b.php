<div class="col-lg-3">
              <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
              <div class="card sidebar-menu mb-4">
                <div class="card-header">
                  <h3 class="h4 card-title">Categorie</h3>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column category-menu">
                   <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="/category/<?php echo e($type->id); ?>" class="nav-link"><?php echo e($type->name); ?></a>
                      <ul class="">
                        <?php $__currentLoopData = App\Models\Type::find($type->id)->productcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prodcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="/index/sc/<?php echo e($prodcat->id); ?>" class="nav-link"><?php echo e($prodcat->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                   </li>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
    
              <!-- *** MENUS AND FILTERS END ***-->
</div>
