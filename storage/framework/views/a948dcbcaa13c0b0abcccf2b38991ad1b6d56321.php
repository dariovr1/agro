<?php $__env->startSection("content"); ?>

  <div id="checkout" class="col-md-9 reviewOrderAfterPay">
              <div class="box">
                  <h1>Riepilogo Ordine</h1>
                  <div class="content py-3">
                    
                      <ul class="list-group">
                      <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($value != ""): ?>
                         <li class="list-group-item"><b><?php echo e($key); ?>:</b> <?php echo e(renderIDOrder([
                          "key" => $key,
                          "value" => $value
                         ])); ?></li>
                         <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <br/>
                     <h3>Metodo di Spedizione</h3>
                       <p><b>Metodo di spedizione scelto:</b> <?php echo e(renderOrderShipping($shipping["shipping"])); ?></p>
                       <br/>
                      <h3>Metodo di Pagamento</h3>
                       <p><b>Metodo di pagamento scelto:</b> <?php echo e(renderPayment($payment["payment"])); ?></p>
                       <h3>Prodotti scelti:</h3>
                     <table class="table">
                        <thead>
                          <tr>
                            <th>Prodotto</th>
                            <th>Prezzo</th>
                            <th>Quantità</th>
                          </tr>
                        </thead>
                        <tbody>
                       <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                          <td><?php echo e($item->name); ?></td>
                           <td><?php echo e($item->price); ?></td>
                          <td><?php echo e($item->qty); ?></td>
                        </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <tr>
                          <td><b>Subtotale</b></td>
                          <td><b><?php echo e($subtotal); ?></b></td>
                          <td></td>
                       </tr>
                    </tbody>
                  </table>

                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="checkout3.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Torna al metodo di pagamento</a>
                   <!--<div id="paypal-button"></div> -->
                   <a href="/paywithpaypal"><button class="btn btn-primary">Paga con Paypal<i class="fa fa-chevron-right"></i></button></a>
                  </div>
              </div>
              <!-- /.box-->
       </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.success.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>