        <div class="col-lg-3">
              <div id="order-summary" class="box">
                <div class="box-header">
                  <h3 class="mb-0">Sommario Ordine</h3>
                </div>
                <p class="text-muted">Spese di spedizioni ed altri costi aggiuntivi sono calcolati in base al peso complessivo degli acquisti e dal CAP della spedizione.</p>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Subtotale Ordine</td>
                        <th><?php echo e($subtotale); ?> €</th>
                      <tr>
                        <td>Costi di Spedizione</td>
                        <th><?php echo e($weight); ?> €</th>
                      </tr>
                      <tr class="total">
                        <td>Totale</td>
                        <th style="padding-left:0px; padding-right:0px;"><?php echo e($totale); ?> €</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php echo $__env->make("components.checkout.coupon", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>