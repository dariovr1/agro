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
                   <?php $__currentLoopData = App\Categorie::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categories): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li><a href="/category/<?php echo e($categories["id"]); ?>" class="nav-link"><?php echo e($categories->nome); ?></a>
                    <?php $subcats = App\Categorie::find($categories->id)->subcategories; ?>
                      <ul class="">
                        <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!empty($subcat)): ?> 
                            <li><a href="/index/sc/<?php echo e($subcat->id); ?>" class="nav-link"><?php echo e($subcat->nome); ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                   </li>

                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              </div>
    
              <!-- *** MENUS AND FILTERS END ***-->
</div>
