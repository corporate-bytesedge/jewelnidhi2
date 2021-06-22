 <?php $__env->startSection('title'); ?><?php echo app('translator')->getFromJson('Invoice'); ?>-<?php echo e($order->getOrderId()); ?>-<?php echo e($order->created_at->format('dmY')); ?><?php if(!empty(config('settings.site_logo_name'))): ?>-<?php echo e(str_slug(config('settings.site_logo_name'))); ?><?php endif; ?> - <?php echo e(config('app.name')); ?><?php $__env->stopSection(); ?> <?php $__env->startSection('page-header-title'); ?> <?php echo app('translator')->getFromJson('View Invoice'); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('page-header-description'); ?> <?php echo app('translator')->getFromJson('View and Print Invoice'); ?> <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?> <div class="container"> <?php echo $__env->make('partials.invoice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> </div> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>