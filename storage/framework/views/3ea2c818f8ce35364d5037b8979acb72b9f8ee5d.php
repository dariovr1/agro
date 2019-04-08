<?php $__env->startSection("content"); ?>
	<div class="jumbotron text-xs-center">
	  <h1 class="display-3">Acquisti Completati con successo!</h1>
	  <hr>
	  <p>Gentile Utente, Grazie per aver acquistato presso Agroambiente s.r.l</p>
	  <p>una e-mail di riepilogo è stata inoltrata a <b><?php echo e($user->email); ?></b> </p>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("templates.success.master", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>