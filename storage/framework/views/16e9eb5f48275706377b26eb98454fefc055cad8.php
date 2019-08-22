<?php $__env->startSection("content"); ?>
<div class="container">
          <div class="row">
            <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="<?php echo e(url()->current()); ?>/create">
                	<?php echo csrf_field(); ?>
                  <h1>Checkout - Metodo di spiegazione</h1>
                  <div class="nav flex-column flex-sm-row nav-pills"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center"> <i class="fa fa-map-marker">                  </i>Indirizzo</a><a href="checkout2.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-truck">                       </i>Metodo di Spedizione</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Metodo Pagamento</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Riepilogo ordine</a></div>
                  <br/>
                   <div class="col-md-12">
                         <?php echo $__env->make('components.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



                          <?php echo $__env->make('components.success', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                   </div>
                  <div class="content py-3">
                    <div class="row">
                     <?php $__currentLoopData = $shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ship): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <div class="col-md-6">
                        <div class="box shipping-method">
                          <h4><?php echo e($ship->nome); ?></h4>
                          <p><?php echo e($ship->descrizione); ?></p>
                          <div class="box-footer text-center">
                            <input type="radio" name="shipping" value="<?php echo e($ship->id); ?>">
                          </div>
                        </div>
                      </div>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="checkout1.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Torna all'indirizzo di spedizione</a>
                    <button type="submit" class="btn btn-primary">Vai al metodo di pagamento<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
            </div>
            <!-- /.col-md-9-->
            	<?php echo $__env->make("components.checkout.totale", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- /.col-md-3-->
          </div>
        </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>