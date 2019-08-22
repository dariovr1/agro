<?php $__env->startSection("title","Area registrazione Agroambiente"); ?>

<?php $__env->startSection("content"); ?>
     <div class="card-body">
         <h2 class="title">Login</h2>


         <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
                      <?php echo csrf_field(); ?>


                      <?php if($errors->any()): ?>
                          <div class="alert alert-danger">
                              <ul>
                                  <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <li><?php echo e($error); ?></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </ul>
                          </div>
                      <?php endif; ?>

                        <div class="form-group">
                          <label for="email" class="text-uppercase">
                            <?php echo e(__('Indirizzo E-mail')); ?>

                          </label>
                          <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" required autofocus />
                          
                        </div>
                        <div class="form-group">
                           <label for="password" class="text-uppercase"><?php echo e(__('Password')); ?></label>
                           <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" required />
                        </div>
                        
                        
                          <div class="form-check">
                                <input class="form-check-input" style="    left: -247px;
    top: 0px;" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                <label class="form-check-label" for="remember">
                                    <?php echo e(__('Ricordami')); ?>

                                </label>
                         </div>

                         <br/>


                          <button type="submit" class="btn btn-primary">
                                <?php echo e(__('Login')); ?>

                            </button>

                             <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link" style="color:#40d427;" href="user/password-reset">
                                    <?php echo e(__('Password Dimenticata?')); ?>

                                </a>
                            <?php endif; ?>


                  </form>
                 
      </div>
<?php $__env->stopSection(); ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<?php echo $__env->make("templates.sign.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>