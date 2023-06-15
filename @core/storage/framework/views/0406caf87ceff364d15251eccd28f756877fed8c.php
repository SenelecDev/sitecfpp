<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo e(session('msg')); ?>

    </div>
<?php endif; ?>
<?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/components/flash-msg.blade.php ENDPATH**/ ?>