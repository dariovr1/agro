<?php $__env->startSection("content"); ?>
  
  <div class="container">

    <div class="row">


            <div class="col-md-12">

               <div class="row productsContainer">
                  <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <div class="col-lg-4 col-md-6">
                      <div class="product">
                        <div class="text">
                         <img src="http://ecommerce2.sabaservice.com/paint/<?php echo e($product->img); ?>" class="img-responsive" />
                          <h3><a href="/detail/<?php echo e($product->id); ?>"><?php echo e($product->name); ?></a></h3>
                          <p class="price"> 
                            <del></del><?php echo e($product->price); ?> €
                          </p>
                        <p class="buttons"><a href="/detail/<?php echo e($product->id); ?>" class="btn btn-outline-secondary">Maggiori dettagli</a><a href="/cart/insert/<?php echo e($product->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a></p>
                        </div>
                        <!-- /.text-->
                      </div>
                      <!-- /.product            -->
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                  <ul class="pagination">
                  <?php echo e($products->links()); ?>

                  </ul>
                </nav>


            </div>
                  

        </div>

      </div>
       
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>