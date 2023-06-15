
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Order Details For:')); ?> <?php echo e($order_details->package_name); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="error-page-content padding-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="billing-title"><?php echo e(__('Order Details')); ?></h2>
                    <ul class="billing-details">
                        <li><strong><?php echo e(__('Order Status:')); ?></strong> <?php echo e($order_details->status); ?></li>
                        <li><strong><?php echo e(__('Payment Method:')); ?></strong> <?php echo e(str_replace('_',' ',$payment_details->package_gateway)); ?></li>
                        <li><strong><?php echo e(__('Payment Status:')); ?></strong> <?php echo e($payment_details->status); ?></li>
                        <li><strong><?php echo e(__('Transaction ID:')); ?></strong> <?php echo e($payment_details->transaction_id); ?></li>
                        <li><strong><?php echo e(__('Date:')); ?></strong> <?php echo e(date_format($payment_details->created_at,'D m Y')); ?></li>
                    </ul>
                    <h2 class="billing-title"><?php echo e(__('Billing Details')); ?></h2>
                    <ul class="billing-details">
                        <li><strong><?php echo e(__('Name:')); ?></strong> <?php echo e($payment_details->name); ?></li>
                        <li><strong><?php echo e(__('Email:')); ?></strong> <?php echo e($payment_details->email); ?></li>
                    </ul>
                    <div class="btn-wrapper margin-top-40">
                        <?php if(auth()->guard('web')->check()): ?>
                            <a href="<?php echo e(route('user.home')); ?>" class="boxed-btn btn-saas"><?php echo e(__('Go To Dashboard')); ?></a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>" class="boxed-btn btn-saas"><?php echo e(__('Back To Home')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
                    <div class="right-content-area">
                        <div class="single-price-plan-01">
                            <div class="right-content-area">
                                <div class="price-header">
                                    <h4 class="title"><?php echo e($package_details->title); ?></h4>
                                    <div class="icon">
                                        <i class="<?php echo e($package_details->icon); ?>"></i>
                                    </div>
                                </div>
                                <div class="price-wrap">
                                    <span class="price"><?php echo e(amount_with_currency_symbol($package_details->price)); ?></span><span class="month"><?php echo e($package_details->type); ?></span>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <?php $__currentLoopData = explode(',',$package_details->features); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><i class="fa fa-check success"></i> <?php echo e($item); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/frontend/pages/package/view-order.blade.php ENDPATH**/ ?>