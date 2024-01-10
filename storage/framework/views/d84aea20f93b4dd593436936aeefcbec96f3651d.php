<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8" />
  <title> <?php echo $__env->yieldContent('title'); ?> | Qamar Foundation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <meta content="Author: Abdul Wahab Qarizada" name="description" />
  <meta content="Abdul Wahab Qarizada" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="<?php echo e(URL::asset('assets/images/favicon.ico')); ?>">
  <!-- Bootstrap Css -->
  <link href="<?php echo e(URL::asset('/assets/css/bootstrap.min.css')); ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
  <!-- Icons Css -->
  <link href="<?php echo e(URL::asset('/assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
  <!-- App Css-->
  <link href="<?php echo e(URL::asset('/assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
  <!-- OrphanGrid Css-->
  <link href="<?php echo e(URL::asset('/assets/css/mystyle/OrphanGrid.css')); ?>" rel="stylesheet" type="text/css" />
  <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<?php echo $__env->yieldContent('body'); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('Layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\Users\TheStranger\Desktop\Projects\LampakaByte\LampakaByte Website\LampakaByte\resources\views/layouts/master-without-nav.blade.php ENDPATH**/ ?>