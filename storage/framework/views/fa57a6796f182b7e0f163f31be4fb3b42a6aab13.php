<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $__env->yieldContent('title'); ?></title>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('/css/style.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <?php echo $__env->yieldSection(); ?>
</head>

<body>
<?php echo $__env->make('components.menu', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent("content"); ?>
<?php $__env->startSection('footer'); ?>
  <!-- permette di dire a blade di avere questo elemento di default se non si specifica altro !-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="/js/main.js"></script>
<?php echo $__env->yieldSection(); ?>
</body>

</html>
