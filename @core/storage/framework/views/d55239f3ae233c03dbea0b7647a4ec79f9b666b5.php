<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo e(session('msg')); ?>

    </div>
<?php endif; ?>
<?php /**PATH /home/xgenxchi/public_html/laravel/zixer/@core/resources/views/components/flash-msg.blade.php ENDPATH**/ ?>