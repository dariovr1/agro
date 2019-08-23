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
    		<p>dettagli nuovo ordine:</p>
    	</div>

      <h1>Dettaglio acquisto:</h1>

            <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                   	<tr>
                   		<td>nome prodotto</td>
                   		<td>prezzo</td>
                   		<td>quantità</td>
                   		<td>subtotale</td>
                   	</tr>
                       <?php $__currentLoopData = $data["carrello"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrello): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                       			<td><?php echo e($carrello["name"]); ?></td>
                       			<td><?php echo e(number_format((float)$carrello["price"], 2, ',', '.')); ?></td>
                       			<td><?php echo e($carrello["qty"]); ?></td>
                       			<td><?php echo e(number_format((float)$carrello["price"] * $carrello["qty"], 2, ',', '.')); ?></td>
                       	  </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>


            <h1>Anagrafica:</h1>


             <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>nome</td>
                      <td>cognome</td>
                      <td>e-mail</td>
                      <td>telefono</td>
                    </tr>
                          <tr>
                            <td><?php echo e($data["user"]["nome"]); ?></td>
                            <td><?php echo e($data["user"]["cognome"]); ?></td>
                            <td><?php echo e($data["user"]["email"]); ?></td>
                            <td><?php echo e($data["user"]["phone"]); ?></td>
                          </tr>
            </table>




                <h1>Spedizione:</h1>


               
             <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">
                    <tr>
                      <td>nome</td>
                      <td>cognome</td>
                      <td>via</td>
                      <td>presso</td>
                      <td>cap</td>
                      <td>comune</td>
                      <td>provincia</td>
                    </tr>
                          <tr>
                            <td><?php echo e($data["spedizione"]["nome"]); ?></td>
                            <td><?php echo e($data["spedizione"]["cognome"]); ?></td>
                            <td><?php echo e($data["spedizione"]["via"]); ?></td>
                            <td><?php echo e($data["spedizione"]["presso"]); ?></td>
                            <td><?php echo e($data["spedizione"]["cap"]); ?></td>
                            <td><?php echo e(renderIDOrder([
                                "key" => "comune",
                                "value" =>   $data["spedizione"]["comune"] 
                              ])); ?></td>
                            <td><?php echo e(renderIDOrder([
                                "key" => "provincia",
                                "value" =>   $data["spedizione"]["provincia"] 
                              ])); ?></td>
                          </tr>
            </table>




    </body>
</html>