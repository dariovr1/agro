<div class="col-lg-12">
              <!-- breadcrumb-->
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                  </li>
                  <?php if(isset($elem)): ?>
                      <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e($elem); ?></a></li>
                  </li>
                  <?php endif; ?>
                </ol>
              </nav>
            </div>