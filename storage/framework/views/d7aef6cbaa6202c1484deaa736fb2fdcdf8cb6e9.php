<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <?php echo app('translator')->get('version'); ?>: <?php echo e($ApplicationSetting->item_version); ?>

    </div>
    <!-- Default to the left -->
    <?php echo app('translator')->get('Copyright'); ?> &copy; <?php echo e(date("Y")); ?> <a class="text-danger" href="https://lineup-aligners.com" target="_blank">LineUp</a>. <?php echo app('translator')->get('All rights reserved'); ?>.
</footer>
<?php /**PATH /home3/etahaorg/test/doctors.lineup-aligners.com/resources/views/layouts/footer.blade.php ENDPATH**/ ?>