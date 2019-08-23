<?php $__env->startSection("content"); ?>
<div id="content">
        <div class="container">
          <div class="row">
            <div id="basket" class="col-lg-9">
              <div class="box">
			 		 <?php if( $count > 0): ?>
			 		 <?php echo $__env->make("components.success", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			 		 <h1>Riepilogo Carrello</h1>
                  	 <br/>
                  <div class="table-responsive">
				  		<table class="table">
				  			 <thead>
						      <tr>
						        <th colspan="2">Prodotto</th>
						        <th>Quantità</th>
						        <th></th>
						        <th colspan="2">Totale Parziale</th>
						      </tr>
						    </thead>
						    <tbody>
					  		<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  		<tr>
	                          <td>
		                          	<a href="#">
		                                <img class="img-responsive" src="<?php echo e($cart->options->imgurl); ?>" />
		                          	</a>
	                      	  </td>
	                          <td><a href="#"><?php echo e($cart->name); ?></a></td>
	                          <td>
	                          	<form name="update<?php echo e($cart->rowId); ?>" method="POST" action="/cart/update">
	                          		<?php echo method_field("PATCH"); ?>
	                          		<?php echo csrf_field(); ?>
	                          		<input type="hidden" name="rowId" value="<?php echo e($cart->rowId); ?>" />
	                          	<input type="number" name="qty" value="<?php echo e($cart->qty); ?>" class="form-control numberCheckOut" onclick="return document.forms.update<?php echo e($cart->rowId); ?>.submit();" />
	                          	</form>
	                          </td>
	                          <td></td>
	                          <td> <?php echo e(number_format((float)$cart->price * $cart->qty, 2, ',', '.')); ?> €</td>
	                          <td>
	                          	<form name="delete<?php echo e($cart->rowId); ?>" method="POST" action="/cart/destroy/<?php echo e($cart->rowId); ?>">
					  						<?php echo method_field("DELETE"); ?>
										    <?php echo csrf_field(); ?>
	                          	<a href="#" onclick="return document.forms.delete<?php echo e($cart->rowId); ?>.submit();"><i class="fa fa-trash-o"></i></a>
	                          		</form>	
	                          </td>
                       	   </tr>
					  		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					  		</tbody>
					  		<tfoot>
                        <tr>
                          <th colspan="4">Subtotale prodotti</th>
                          <th colspan="2"><?php echo e($subtotale); ?>  €</th>
                        </tr>
                      </tfoot>
				  		</table>
                  </div>
                  <?php endif; ?>
                   <?php if( $count == 0 ): ?>
                  	<p>il carrello è vuoto. Inserisci un prodotto per continuare gli acquisti.</p>
                  <?php endif; ?>
                  <div class="box-footer d-flex justify-content-between flex-column flex-lg-row">
                    <div class="left"><a href="/" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i> Continua gli acquisti</a></div>
                    <div class="right">
                      <a href="/cart/checkout">
                   	   <button type="submit" class="btn btn-primary">Procedi con l'ordine<i class="fa fa-chevron-right"></i></button>
                   	  </a>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.col-lg-9-->
            <?php if($count > 0): ?>
           		 <?php echo $__env->make("components.checkout.totale", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
            <!-- /.col-md-3-->
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>