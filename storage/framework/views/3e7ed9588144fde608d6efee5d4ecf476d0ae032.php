

<?php $__env->startSection('content'); ?>     
    <?php echo $__env->make('front.includes.mi_cuenta_contenido', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>