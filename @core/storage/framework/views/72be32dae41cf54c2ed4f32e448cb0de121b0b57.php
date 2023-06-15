<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="main-content-inner">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4 mt-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-thumb-up"></i> <?php echo e(__('Total Admin')); ?></div>
                                    <h2><?php echo e($total_admin); ?></h2>
                                </div>
                                <canvas id="seolinechart1" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Blogs')); ?></div>
                                    <h2><?php echo e($blog_count); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Testimonial')); ?></div>
                                    <h2><?php echo e($total_testimonial); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Team Member')); ?></div>
                                    <h2><?php echo e($total_team_member); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Counterup')); ?></div>
                                    <h2><?php echo e($total_counterup); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg2">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Price Plan')); ?></div>
                                    <h2><?php echo e($total_price_plan); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg3">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Work Item')); ?></div>
                                    <h2><?php echo e($total_works); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg4">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Services')); ?></div>
                                    <h2><?php echo e($total_services); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-md-5 mb-3">
                        <div class="card">
                            <div class="seo-fact sbg1">
                                <div class="p-4 d-flex justify-content-between align-items-center">
                                    <div class="seofct-icon"><i class="ti-share"></i> <?php echo e(__('Total Key Feature')); ?></div>
                                    <h2><?php echo e($total_key_features); ?></h2>
                                </div>
                                <canvas id="seolinechart2" height="50"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card margin-top-40">
                            <div class="card-header bg-dark">
                                <h4 class="title text-white"><?php echo e(__('Recent Orders')); ?></h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <th><?php echo e(__('Order ID')); ?></th>
                                        <th><?php echo e(__('Amount')); ?></th>
                                        <th><?php echo e(__('Payment Gateway')); ?></th>
                                        <th><?php echo e(__('Payment Status')); ?></th>
                                        <th><?php echo e(__('Date')); ?></th>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $recent_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>#<?php echo e($data->id); ?></td>
                                                <td><?php echo e(amount_with_currency_symbol($data->amount)); ?></td>
                                                <td><?php echo e(str_replace('_',' ',$data->package_gateway)); ?></td>
                                                <td>
                                                    <?php $pay_status = $data->status; ?>
                                                    <?php if($pay_status == 'complete'): ?>
                                                        <span class="alert alert-success"><?php echo e($pay_status); ?></span>
                                                    <?php elseif($pay_status == 'pending'): ?>
                                                        <span class="alert alert-warning"><?php echo e($pay_status); ?></span>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e(date_format($data->created_at,'d M Y h:i:s')); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\zixer-update\@core\resources\views/backend/admin-home.blade.php ENDPATH**/ ?>