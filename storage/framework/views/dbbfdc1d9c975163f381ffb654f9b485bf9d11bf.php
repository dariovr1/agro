<?php $__env->startSection("content"); ?>
  <div id="all">
      <div id="content">

      <?php echo $__env->make("components.slideshow", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


        <div class="container">
                <div class="row">
                        <?php echo $__env->make("components.sidebar-category", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                     <div class="col-lg-9">

                          <?php if(!empty($elem)): ?>
                            <div class="box">
                              <h1><?php echo e($nome); ?></h1>
                            </div>

                            <?php echo $__env->make('components.success', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                           <div class="row products">
                                <?php $__currentLoopData = $elem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <div class="col-lg-4 col-md-6">
                                    <div class="product">
                                      <div class="text">
                                       <img src="/items/<?php echo e($e->codice.'.'.$e->ext); ?>" class="img-responsive">
                                        <h3><a href="/detail/<?php echo e($e->id); ?>"><?php echo e($e->nome); ?></a></h3>
                                        <p class="price"> 
                                          <del></del><?php echo e($e->prezzo); ?> €
                                        </p>
                                        <p class="buttons"><a href="/detail/<?php echo e($e->id); ?>" class="btn btn-outline-secondary">Maggiori dettagli</a><a href="/cart/insert/<?php echo e($e->id); ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Aggiungi al carrello</a></p>
                                      </div>
                                      <!-- /.text-->
                                    </div>
                                    <!-- /.product            -->
                                  </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </div>

                                  <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                <ul class="pagination">
                                <?php echo e($elem->links()); ?>

                                </ul>
                              </nav>

                          <?php endif; ?>

                           <?php if(empty($elem)): ?>

                             <div class="box">
                              <h1>Gentile utente, Benvenuto su Agroambiente s.r.l</h1>
                            </div>

                            <div class="box">
                                <p>utilizza la barra di sinistra per navigare all'interno delle categorie, oppure naviga nelle sezioni all'interno della voce di menu "i miei prodotti" </p>
                            </div>

                           <?php endif; ?>
                    </div>

                </div>
        </div>

     </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>