<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <body>
    	<?php if($data["status"] == 0): ?>
       <p>il prodotto con codice <?php echo e($data["codice"]); ?> è stato aggiornato.</p>
       <p>Le sue unità disponibili sono passati da <?php echo e($data["aqty"]); ?> a <?php echo e($data["qty"]); ?></p>
       <?php endif; ?>

       <?php if($data["status"] == 1): ?>
       	  <p>il prodotto con codice <?php echo e($data["codice"]); ?> non è stato aggiornato. il prodotto non è disponibile (0)</p>
       <?php endif; ?>
    </body>
</html>