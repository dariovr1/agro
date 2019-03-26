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

    <?php echo $__env->make("components.header", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <div id="all">
     <?php echo $__env->yieldContent("content"); ?>
    </div>

    <?php echo $__env->make("components.footer", \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php $__env->startSection('js'); ?>
     <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script src="/js/front.js"></script>
    <?php echo $__env->yieldSection(); ?>
   
</body>
</html>