<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $__env->yieldContent("title","agroambiente"); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <?php echo $__env->make("components.css", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>
  <body>

    <div class="container">
     <?php echo $__env->yieldContent("content"); ?>
    </div>

    <?php $__env->startSection('js'); ?>
     <script src="/vendor/jquery/jquery.min.js"></script>
    <?php echo $__env->yieldSection(); ?>
   
</body>
</html>