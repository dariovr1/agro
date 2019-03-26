<?php $__env->startSection("content"); ?>

	<div class="container">

		<div class="row">

		  <div id="checkout" class="col-lg-9">
              <div class="box">
                <form method="POST" action="<?php echo e(url()->current()); ?>/create">
                  <?php echo csrf_field(); ?>
                  <h1>Checkout - Inserisci indirizzo</h1>
                  <div class="nav flex-column flex-md-row nav-pills text-center"><a href="checkout1.html" class="nav-link flex-sm-fill text-sm-center active"> <i class="fa fa-map-marker">                  </i>Indirizzo</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-truck">                       </i>Metodo di Spedizione</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-money">                      </i>Metodo di Pagamento</a><a href="#" class="nav-link flex-sm-fill text-sm-center disabled"> <i class="fa fa-eye">                     </i>Riepilogo ordine</a></div>
                  <div class="content py-3">
                    <div class="row">

                      <div class="col-md-12">
                         <?php echo $__env->make('components.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



                          <?php echo $__env->make('components.success', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                        </div>

                      <div class="col-md-6">


                             <?php echo $__env->make('components.input',[
                                "elem" => "nome",
                                "required" => "required"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                           <?php echo $__env->make('components.input',[
                                "elem" => "cognome",
                                "required" => "required"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                              <?php echo $__env->make('components.input',[
                                "elem" => "azienda",
                                "required" => "required"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                             <?php echo $__env->make('components.input',[
                                "elem" => "via",
                                "required" => "required"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                    <div class="row">
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                           <?php echo $__env->make('components.input',[
                                "elem" => "presso"
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                          <?php echo $__env->make('components.input',[
                                "elem" => "cap",
                                "required" => "required"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                           <?php echo $__env->make('components.select',[
                              "name" => "comune",
                              "elems" => App\Citie::orderBy('comune')->get(),
                              "id" => "id",
                              "field" => "comune",
                              "required" => "required"
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-3">
                       <?php echo $__env->make('components.select',[
                            "name" => "provincia",
                            "elems" => App\Prov::orderBy('provincia')->get(),
                            "id" => "id",
                            "field" => "provincia",
                            "required" => "required"
                          ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         <?php echo $__env->make('components.input',[
                                "elem" => "telefono"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                         <?php echo $__env->make('components.input',[
                                "elem" => "email"
                              ], \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                      </div>
                    </div>
                    <!-- /.row-->
                  </div>
                  <div class="box-footer d-flex justify-content-between"><a href="basket.html" class="btn btn-outline-secondary"><i class="fa fa-chevron-left"></i>Vai al carrello</a>
                    <button type="submit" class="btn btn-primary">Continua con il metodo di spedizione<i class="fa fa-chevron-right"></i></button>
                  </div>
                </form>
              </div>
              <!-- /.box-->
   		 </div>

       <?php echo $__env->make("components.totale", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


		</div>

	</div>

	

<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>