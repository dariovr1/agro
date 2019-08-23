<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Benvenuto su Agroambiente s.r.l</title>
        <style type="text/css">
        body {margin: 0; padding: 0; min-width: 100%!important;}
        .content {width: 100%;}  
        </style>
    </head>
    <body yahoo bgcolor="#f6f8f1">

    	<div>
    		<h1>Gent.le utente, grazie per aver acquistato presso Agroambiente s.rl.</h1>
    		<p>qui di seguito il riepilogo dei prodotti acquistati:</p>
    	</div>

            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                   	<tr>
                   		<td>nome prodotto</td>
                   		<td>prezzo</td>
                   		<td>quantità</td>
                   		<td>subtotale</td>
                   	</tr>
                       <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                       			<td><?php echo e($data["name"]); ?></td>
                       			<td><?php echo e(number_format((float)$data["price"], 2, ',', '.')); ?></td>
                       			<td><?php echo e($data["qty"]); ?></td>
                       			<td><?php echo e(number_format((float)$data["price"] * $data["qty"], 2, ',', '.')); ?></td>
                       	  </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
    </body>
</html>